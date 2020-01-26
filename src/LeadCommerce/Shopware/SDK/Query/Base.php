<?php

namespace LeadCommerce\Shopware\SDK\Query;

use GuzzleHttp\Exception\GuzzleException;
use LeadCommerce\Shopware\SDK\Converter\BaseConverter;
use LeadCommerce\Shopware\SDK\Exception\MethodNotAllowedException;
use LeadCommerce\Shopware\SDK\ShopwareClient;
use LeadCommerce\Shopware\SDK\Util\Constants;
use LeadCommerce\Shopware\SDK\Util\Query;
use Psr\Http\Message\ResponseInterface;
use RuntimeException;

/**
 * Class Base
 *
 * @author Alexander Mahrt <amahrt@leadcommerce.de>
 * @copyright 2016 LeadCommerce <amahrt@leadcommerce.de>
 */
abstract class Base
{
    /**
     * @var ShopwareClient
     */
    protected $client;

    /**
     * @var string
     */
    protected $queryPath;

    /**
     * @var array
     */
    protected $methodsAllowed = [
        Constants::METHOD_CREATE,
        Constants::METHOD_GET,
        Constants::METHOD_GET_BATCH,
        Constants::METHOD_UPDATE,
        Constants::METHOD_UPDATE_BATCH,
        Constants::METHOD_DELETE,
        Constants::METHOD_DELETE_BATCH,
    ];

    /**
     * Gets the query path to look for entities.
     * E.G: 'variants' or 'articles'
     *
     * @return string
     */
    abstract protected function getQueryPath();

    /**
     * Gets the class for the entities.
     *
     * @return string
     */
    abstract protected function getConverterClass();

    /**
     * Base constructor.
     *
     * @param ShopwareClient $client
     */
    public function __construct(ShopwareClient $client)
    {
        $this->client = $client;
        $this->queryPath = $this->getQueryPath();
    }

    /**
     * Finds all entities.
     *
     * @return \LeadCommerce\Shopware\SDK\Entity\Base[]
     * @throws MethodNotAllowedException
     * @throws GuzzleException
     */
    public function findAll()
    {
        $this->validateMethodAllowed(Constants::METHOD_GET_BATCH);

        return $this->fetch($this->queryPath);
    }

    /**
     * Finds all entities based on given query parameters.
     *
     * @param Query $query
     * @return \LeadCommerce\Shopware\SDK\Entity\Base[]
     * @throws GuzzleException
     * @throws MethodNotAllowedException
     */
    public function queryAll(Query $query)
    {
        $this->validateMethodAllowed(Constants::METHOD_GET_BATCH);

        return $this->fetch($this->queryPath, 'GET', null, $query->getQuery());
    }

    /**
     * Finds an entity by its id.
     *
     * @param $id
     *
     * @return \LeadCommerce\Shopware\SDK\Entity\Base
     * @throws MethodNotAllowedException
     * @throws GuzzleException
     */
    public function findOne($id)
    {
        $this->validateMethodAllowed(Constants::METHOD_GET);

        return $this->fetch($this->queryPath . '/' . $id);
    }

    /**
     * Creates an entity.
     *
     * @param \LeadCommerce\Shopware\SDK\Entity\Base $entity
     *
     * @return \LeadCommerce\Shopware\SDK\Entity\Base
     * @throws MethodNotAllowedException
     * @throws GuzzleException
     *
     */
    public function create(\LeadCommerce\Shopware\SDK\Entity\Base $entity)
    {
        $this->validateMethodAllowed(Constants::METHOD_CREATE);

        return $this->fetch($this->queryPath, 'POST', $entity->getArrayCopy());
    }

    /**
     * Updates an entity.
     *
     * @param \LeadCommerce\Shopware\SDK\Entity\Base $entity
     *
     * @return array|mixed
     * @throws MethodNotAllowedException
     * @throws GuzzleException
     *
     */
    public function update(\LeadCommerce\Shopware\SDK\Entity\Base $entity)
    {
        $this->validateMethodAllowed(Constants::METHOD_UPDATE);

        return $this->fetch($this->queryPath . '/' . $entity->getId(), 'PUT', $entity->getArrayCopy());
    }

    /**
     * Updates a batch of this entity.
     *
     * @param \LeadCommerce\Shopware\SDK\Entity\Base[] $entities
     *
     * @return \LeadCommerce\Shopware\SDK\Entity\Base[]
     * @throws MethodNotAllowedException
     * @throws GuzzleException
     */
    public function updateBatch($entities)
    {
        $this->validateMethodAllowed(Constants::METHOD_UPDATE_BATCH);
        $body = [];
        foreach ($entities as $entity) {
            $body[] = $entity->getArrayCopy();
        }

        return $this->fetch($this->queryPath . '/', 'PUT', $body);
    }

    /**
     * Deletes an entity by its id..
     *
     * @param $id
     *
     * @return array|mixed
     * @throws MethodNotAllowedException
     * @throws GuzzleException
     */
    public function delete($id)
    {
        $this->validateMethodAllowed(Constants::METHOD_DELETE);

        return $this->fetch($this->queryPath . '/' . $id, 'DELETE');
    }

    /**
     * Deletes a batch of this entity given by ids.
     *
     * @param array $ids
     *
     * @return array|mixed
     * @throws MethodNotAllowedException
     * @throws GuzzleException
     */
    public function deleteBatch(array $ids)
    {
        $this->validateMethodAllowed(Constants::METHOD_DELETE_BATCH);

        return $this->fetch($this->queryPath . '/', 'DELETE', $ids);
    }

    /**
     * Fetch and build entity.
     *
     * @param string $uri
     * @param string $method
     * @param mixed $body
     * @param array $query
     *
     * @return array|mixed
     * @throws GuzzleException
     */
    protected function fetch(string $uri, string $method = 'GET', $body = null, array $query = [])
    {
        $response = $this->client->request($uri, $method, $body, ['query' => $query]);

        return $this->createEntityFromResponse($response);
    }

    /**
     * Creates an entity
     *
     * @param ResponseInterface $response
     *
     * @return array|mixed
     */
    protected function createEntityFromResponse(ResponseInterface $response)
    {
        $body = $response->getBody()->getContents();
        $content = json_decode($body);
        
        if (is_null($content)) {
            $this->client->getLogger()->debug($body);
            throw new RuntimeException('Failed converting response body into json');
        }

        if (!isset($content->data)) {
            return $content->success;
        }

        $content = $content->data;

        if (is_array($content)) {
            return array_map(function ($item) {
                return $this->createEntity($item);
            }, $content);
        } else {
            return $this->createEntity($content);
        }
    }

    /**
     * Creates an entity based on the getClass method.
     *
     * @param $content
     *
     * @return \LeadCommerce\Shopware\SDK\Entity\Base
     */
    protected function createEntity($content)
    {
        $class = $this->getConverterClass();
        /** @var BaseConverter $converter */
        $converter = new $class();
        $content = json_decode(json_encode($content), true);

        return $converter->convert($content);
    }

    /**
     * @param string $uri
     * @param string $method
     * @param null $body
     *
     * @return mixed|ResponseInterface
     * @throws GuzzleException
     */
    protected function fetchSimple(string $uri, string $method = 'GET', $body = null)
    {
        return $this->client->request($uri, $method, $body);
    }

    /**
     * Fetch as json object.
     *
     * @param string $uri
     * @param string $method
     * @param null $body
     *
     * @return false|\stdClass
     * @throws GuzzleException
     */
    protected function fetchJson(string $uri, string $method = 'GET', $body = null)
    {
        $response = $this->client->request($uri, $method, $body);
        $response = json_decode($response->getBody()->getContents());

        return $response ? $response : null;
    }

    /**
     * Validates if the requested method is allowed.
     *
     * @param $method
     *
     * @throws MethodNotAllowedException
     */
    private function validateMethodAllowed($method)
    {
        if (!in_array($method, $this->methodsAllowed)) {
            throw new MethodNotAllowedException('Method ' . $method . ' is not allowed for ' . get_class($this));
        }
    }
}
