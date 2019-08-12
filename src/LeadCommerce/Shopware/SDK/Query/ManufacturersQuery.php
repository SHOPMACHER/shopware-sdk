<?php

namespace LeadCommerce\Shopware\SDK\Query;

use LeadCommerce\Shopware\SDK\Util\Constants;

/**
 * Class ManufacturersQuery
 *
 * @author Alexander Mahrt <amahrt@leadcommerce.de>
 * @copyright 2016 LeadCommerce <amahrt@leadcommerce.de>
 */
class ManufacturersQuery extends Base
{
    /**
     * @var array
     */
    protected $methodsAllowed = [
        Constants::METHOD_CREATE,
        Constants::METHOD_GET,
        Constants::METHOD_GET_BATCH,
        Constants::METHOD_UPDATE,
        Constants::METHOD_DELETE,
    ];

    /**
     * @return mixed
     */
    protected function getConverterClass()
    {
        return 'LeadCommerce\\Shopware\\SDK\\Converter\\SupplierConverter';
    }

    /**
     * @return string
     */
    protected function getQueryPath()
    {
        return 'manufacturers';
    }
}
