<?php

namespace LeadCommerce\Shopware\SDK\Converter;

use LeadCommerce\Shopware\SDK\Entity\Order;

/**
 * Class OrderConverter
 * @package LeadCommerce\Shopware\SDK\Converter
 */
class OrderConverter extends BaseConverter
{
    /**
     * @return string
     */
    public function getEntityClass(): string
    {
        return Order::class;
    }
}
