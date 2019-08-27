<?php

namespace LeadCommerce\Shopware\SDK\Converter;

use LeadCommerce\Shopware\SDK\Entity\PropertyGroup;

/**
 * Class PropertyGroupConverter
 * @package LeadCommerce\Shopware\SDK\Converter
 */
class PropertyGroupConverter extends BaseConverter
{
    /**
     * @return string
     */
    public function getEntityClass(): string
    {
        return PropertyGroup::class;
    }
}
