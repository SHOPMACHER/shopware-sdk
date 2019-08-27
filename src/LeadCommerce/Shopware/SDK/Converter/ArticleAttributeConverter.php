<?php

namespace LeadCommerce\Shopware\SDK\Converter;

use LeadCommerce\Shopware\SDK\Entity\ArticleAttribute;

/**
 * Class ArticleAttributeConverter
 * @package LeadCommerce\Shopware\SDK\Converter
 */
class ArticleAttributeConverter extends BaseConverter
{
    /**
     * @return string
     */
    public function getEntityClass(): string
    {
        return ArticleAttribute::class;
    }
}
