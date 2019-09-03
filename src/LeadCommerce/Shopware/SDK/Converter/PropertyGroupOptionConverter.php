<?php

namespace LeadCommerce\Shopware\SDK\Converter;

use LeadCommerce\Shopware\SDK\Entity\PropertyGroupOption;

/**
 * Class PropertyGroupOptionConverter
 * @package LeadCommerce\Shopware\SDK\Converter
 */
class PropertyGroupOptionConverter extends BaseConverter
{
    /**
     * @return string
     */
    public function getEntityClass(): string
    {
        return PropertyGroupOption::class;
    }
    
    /**
     * @inheritDoc
     */
    public function convert(array $data)
    {
        if (isset($data['id'])) {
            return parent::convert($data);
        }
        $result = [];
        foreach ($data as $single) {
            array_push($result, parent::convert($single));
        }
        return $result;
    }
}
