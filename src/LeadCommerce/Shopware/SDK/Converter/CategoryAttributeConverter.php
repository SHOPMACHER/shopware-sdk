<?php

namespace LeadCommerce\Shopware\SDK\Converter;

use LeadCommerce\Shopware\SDK\Entity\CategoryAttribute;

/**
 * Class CategoryAttributeConverter
 * @package LeadCommerce\Shopware\SDK\Converter
 */
class CategoryAttributeConverter extends BaseConverter
{
    /**
     * @return string
     */
    public function getEntityClass(): string
    {
        return CategoryAttribute::class;
    }
}
