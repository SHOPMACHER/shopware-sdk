<?php

namespace LeadCommerce\Shopware\SDK;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Handler\CurlHandler;
use GuzzleHttp\HandlerStack;
use LeadCommerce\Shopware\SDK\Query\AddressQuery;
use LeadCommerce\Shopware\SDK\Query\ArticleQuery;
use LeadCommerce\Shopware\SDK\Query\CacheQuery;
use LeadCommerce\Shopware\SDK\Query\CategoriesQuery;
use LeadCommerce\Shopware\SDK\Query\CountriesQuery;
use LeadCommerce\Shopware\SDK\Query\CustomerGroupsQuery;
use LeadCommerce\Shopware\SDK\Query\CustomerQuery;
use LeadCommerce\Shopware\SDK\Query\GenerateArticleImagesQuery;
use LeadCommerce\Shopware\SDK\Query\ManufacturersQuery;
use LeadCommerce\Shopware\SDK\Query\MediaQuery;
use LeadCommerce\Shopware\SDK\Query\OrdersQuery;
use LeadCommerce\Shopware\SDK\Query\PropertyGroupsQuery;
use LeadCommerce\Shopware\SDK\Query\ShopsQuery;
use LeadCommerce\Shopware\SDK\Query\TranslationsQuery;
use LeadCommerce\Shopware\SDK\Query\VariantsQuery;
use LeadCommerce\Shopware\SDK\Query\VersionQuery;
use Psr\Http\Message\ResponseInterface;
use Psr\Log\LoggerInterface;

/**
 * Class ShopwareClient
 *
 * @author Alexander Mahrt <amahrt@leadcommerce.de>
 * @copyright 2016 LeadCommerce <amahrt@leadcommerce.de>
 *
 * @method AddressQuery getAddressQuery()
 * @method ArticleQuery getArticleQuery()
 * @method CacheQuery getCacheQuery()
 * @method CategoriesQuery getCategoriesQuery()
 * @method CountriesQuery getCountriesQuery()
 * @method CustomerGroupsQuery getCustomerGroupsQuery()
 * @method CustomerQuery getCustomerQuery()
 * @method GenerateArticleImagesQuery getGenerateArticleImageQuery()
 * @method MediaQuery getMediaQuery()
 * @method ManufacturersQuery getManufacturersQuery()
 * @method OrdersQuery getOrdersQuery()
 * @method PropertyGroupsQuery getPropertyGroupsQuery()
 * @method ShopsQuery getShopsQuery()
 * @method TranslationsQuery getTranslationsQuery()
 * @method VariantsQuery getVariantsQuery()
 * @method VersionQuery getVersionQuery()
 */
class ShopwareClient
{
    const VERSION = '0.0.1';

    /**
     * @var Config
     */
    private $config;

    /**
     * @var LoggerInterface
     */
    private $logger;

    /**
     * @var Client
     */
    protected $client;

    /**
     * ShopwareClient constructor.
     *
     * @param Config $config
     * @param LoggerInterface $logger
     */
    public function __construct(Config $config, LoggerInterface $logger)
    {
        $this->config = $config;
        $this->logger = $logger;
        $curlHandler = new CurlHandler();
        $handlerStack = HandlerStack::create($curlHandler);

        $guzzleOptions = array_merge($config->getGuzzleOptions(), [
            'base_uri' => $config->getBaseUrl(),
            'handler' => $handlerStack,
        ]);
        $this->client = new Client($guzzleOptions);
    }

    /**
     * Does a request.
     *
     * @param string $uri
     * @param string $method
     * @param mixed $body
     * @param array $headers
     *
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function request(string $uri, string $method = 'GET', $body = null, $headers = [])
    {
        return $this->client->request($method, $uri, [
            'json' => $body,
            'headers' => $headers,
            'auth' => [
                $this->getConfig()->getUsername(),
                $this->getConfig()->getApiKey(),
                'digest',
            ],
        ]);
    }

    /**
     * Magically get the query classes.
     *
     * @param $name
     * @param array $arguments
     *
     * @return bool
     */
    public function __call($name, $arguments = [])
    {
        if (!preg_match('/^get([a-z]+Query)$/i', $name, $matches)) {
            return false;
        }

        $className = __NAMESPACE__ . '\\Query\\' . $matches[1];

        if (!class_exists($className)) {
            return false;
        }

        return new $className($this);
    }

    /**
     * @return Client
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * @param Client $client
     *
     * @return ShopwareClient
     */
    public function setClient($client)
    {
        $this->client = $client;

        return $this;
    }

    /**
     * @return Config
     */
    public function getConfig(): Config
    {
        return $this->config;
    }

    /**
     * @return LoggerInterface
     */
    public function getLogger(): LoggerInterface
    {
        return $this->logger;
    }
}
