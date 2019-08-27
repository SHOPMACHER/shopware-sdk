<?php

namespace LeadCommerce\Shopware\SDK\Converter;

/**
 * Class ArticleDetailConverter
 * @package LeadCommerce\Shopware\SDK\Converter
 */
class ArticleDetailConverter extends BaseConverter
{
    /**
     * @inheritDoc
     */
    public function __construct()
    {
        $this->setSubConverter([
          'attribute' => ArticleAttributeConverter::class,
        ]);
    }
    
    /**
     * @return string
     */
    public function getEntityClass(): string
    {
        return '\\LeadCommerce\\Shopware\\SDK\\Entity\\ArticleDetail';
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
