<?php

namespace LeadCommerce\Shopware\SDK\Converter;

use LeadCommerce\Shopware\SDK\Entity\Translation;

/**
 * Class TranslationConverter
 * @package LeadCommerce\Shopware\SDK\Converter
 */
class TranslationConverter extends BaseConverter
{
    /**
     * @return string
     */
    public function getEntityClass(): string
    {
        return Translation::class;
    }
}
