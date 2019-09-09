<?php

namespace LeadCommerce\Shopware\SDK\Query;

use GuzzleHttp\Exception\GuzzleException;
use LeadCommerce\Shopware\SDK\Converter\OrderConverter;
use LeadCommerce\Shopware\SDK\Util\Constants;

/**
 * Class OrdersQuery
 *
 * @author Alexander Mahrt <amahrt@leadcommerce.de>
 * @copyright 2016 LeadCommerce <amahrt@leadcommerce.de>
 */
class OrdersQuery extends Base
{
    /**
     * @var array
     */
    protected $methodsAllowed = [
        Constants::METHOD_GET,
        Constants::METHOD_GET_BATCH,
        Constants::METHOD_UPDATE,
    ];
    
    /**
     * @return mixed
     */
    protected function getConverterClass()
    {
        return OrderConverter::class;
    }

    /**
     * Gets the query path to look for entities.
     * E.G: 'variants' or 'articles'
     *
     * @return string
     */
    protected function getQueryPath()
    {
        return 'orders';
    }
    
    /**
     * Find one article based on given article number
     * @param string $number
     * @return \LeadCommerce\Shopware\SDK\Entity\Base
     * @throws GuzzleException
     */
    public function findOneByNumber(string $number)
    {
        return $this->fetch($this->queryPath . '/' . $number, 'GET', null, ['useNumberAsId' => 'true']);
    }
}
