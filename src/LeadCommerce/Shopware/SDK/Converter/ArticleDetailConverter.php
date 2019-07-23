<?php

namespace LeadCommerce\Shopware\SDK\Converter;

/**
 * Class ArticleDetailConverter
 * @package LeadCommerce\Shopware\SDK\Converter
 */
class ArticleDetailConverter extends BaseConverter
{
    /**
     * @return string
     */
    public function getEntityClass(): string
    {
        return '\\LeadCommerce\\Shopware\\SDK\\Entity\\ArticleDetail';
    }
}
