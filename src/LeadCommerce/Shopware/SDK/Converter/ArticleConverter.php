<?php

namespace LeadCommerce\Shopware\SDK\Converter;

/**
 * Class ArticleConverter
 * @package LeadCommerce\Shopware\SDK\Converter
 */
class ArticleConverter extends BaseConverter
{
    /**
     * @return string
     */
    public function getEntityClass(): string
    {
        return '\\LeadCommerce\\Shopware\\SDK\\Entity\\Article';
    }
}
