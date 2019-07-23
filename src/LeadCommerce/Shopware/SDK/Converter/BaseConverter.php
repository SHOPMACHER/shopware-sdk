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
     * @var BaseConverter[]
     */
    private $converter = [];

    /**
     * @return string
     */
    public function getEntityClass(): string
    {
        return '\\LeadCommerce\\Shopware\\SDK\\Entity\\Base';
    }

    /**
     * Set Sub-Converter definition with responsible key and converter class.
     *
     * @param array $config
     */
    public function setSubConverter(array $config)
    {
        $this->converter = $config;
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
                    $entity->$setter($this->convertValueForKey($key, $value));
                }
            }
        }

        return $entity;
    }

    /**
     * @param string $key
     * @param mixed $value
     * @return mixed
     */
    private function convertValueForKey(string $key, $value)
    {
        $key = strtolower($key);

        if ($this->hasConverterForKey($key)) {
            return $this->runConverterForKey($key, $value);
        }

        return $value;
    }

    /**
     * @param string $key
     * @return bool
     */
    private function hasConverterForKey(string $key): bool
    {
        return array_key_exists($key, $this->converter);
    }

    /**
     * @param string $key
     * @param $value
     * @return Base
     */
    private function runConverterForKey(string $key, $value): Base
    {
        if (is_string($this->converter[$key])) {
            $class = $this->converter[$key];
            $this->converter[$key] = new $class();
        }

        return $this->converter[$key]->convert($value);
    }
}
