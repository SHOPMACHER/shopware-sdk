<?php

namespace LeadCommerce\Shopware\SDK\Converter;

use LeadCommerce\Shopware\SDK\Entity\ArticleAttribute;
use LeadCommerce\Shopware\SDK\Entity\CustomerGroup;

/**
 * Class CustomerGroupConverter
 * @package LeadCommerce\Shopware\SDK\Converter
 */
class CustomerGroupConverter extends BaseConverter
{
    /**
     * @return string
     */
    public function getEntityClass(): string
    {
        return CustomerGroup::class;
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
