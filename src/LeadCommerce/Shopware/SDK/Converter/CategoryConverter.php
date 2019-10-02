<?php

namespace LeadCommerce\Shopware\SDK\Converter;

use LeadCommerce\Shopware\SDK\Entity\Category;

/**
 * Class CategoryConverter
 * @package LeadCommerce\Shopware\SDK\Converter
 */
class CategoryConverter extends BaseConverter
{
    /**
     * @inheritDoc
     */
    public function __construct()
    {
        $this->setSubConverter([
          'attribute' => CategoryAttributeConverter::class
        ]);
    }
    
    /**
     * @return string
     */
    public function getEntityClass(): string
    {
        return Category::class;
    }
}
