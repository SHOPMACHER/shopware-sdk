<?php

namespace LeadCommerce\Shopware\SDK\Converter;

/**
 * Class ArticleConverter
 * @package LeadCommerce\Shopware\SDK\Converter
 */
class ArticleConverter extends BaseConverter
{
    /**
     * @inheritDoc
     */
    public function __construct()
    {
        $this->setSubConverter([
            'maindetail' => 'LeadCommerce\\Shopware\\SDK\\Converter\\ArticleDetailConverter'
        ]);
    }

    /**
     * @return string
     */
    public function getEntityClass(): string
    {
        return '\\LeadCommerce\\Shopware\\SDK\\Entity\\Article';
    }
}
