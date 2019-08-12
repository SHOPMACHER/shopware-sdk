<?php

namespace LeadCommerce\Shopware\SDK\Converter;

/**
 * Class SupplierConverter
 * @package LeadCommerce\Shopware\SDK\Converter
 */
class SupplierConverter extends BaseConverter
{
    /**
     * @return string
     */
    public function getEntityClass(): string
    {
        return '\\LeadCommerce\\Shopware\\SDK\\Entity\\Supplier';
    }
}
