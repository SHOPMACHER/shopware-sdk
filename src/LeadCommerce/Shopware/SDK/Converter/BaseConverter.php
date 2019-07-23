<?php

namespace LeadCommerce\Shopware\SDK\Converter;

use LeadCommerce\Shopware\SDK\Entity\Base;

/**
 * Class BaseConverter
 * @package LeadCommerce\Shopware\SDK\Converter
 */
class BaseConverter
{
    /**
     * @return string
     */
    public function getEntityClass(): string
    {
        return '\\LeadCommerce\\Shopware\\SDK\\Entity\\Base';
    }

    /**
     * @param array $data
     * @return Base
     */
    public function convert(array $data): Base
    {
        $class = $this->getEntityClass();
        $entity = new $class();

        if ($entity instanceof \LeadCommerce\Shopware\SDK\Entity\Base) {
            foreach ($data as $key => $value) {
                $setter = 'set' . ucfirst($key);
                if (method_exists($entity, $setter)) {
                    $entity->$setter($value);
                }
            }
        }

        return $entity;
    }
}
