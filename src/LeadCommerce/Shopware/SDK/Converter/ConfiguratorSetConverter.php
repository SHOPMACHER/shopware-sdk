<?php

namespace LeadCommerce\Shopware\SDK\Converter;

use LeadCommerce\Shopware\SDK\Entity\ConfiguratorSet;

/**
 * Class ConfiguratorSetConverter
 * @package LeadCommerce\Shopware\SDK\Converter
 */
class ConfiguratorSetConverter extends BaseConverter
{
    /**
     * @return string
     */
    public function getEntityClass(): string
    {
        return ConfiguratorSet::class;
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
            $result[] = parent::convert($single);
        }
        return $result;
    }
}
