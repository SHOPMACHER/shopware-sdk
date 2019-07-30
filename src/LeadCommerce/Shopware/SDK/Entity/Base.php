<?php

namespace LeadCommerce\Shopware\SDK\Entity;

/**
 * Class Base
 *
 * @author Alexander Mahrt <amahrt@leadcommerce.de>
 * @copyright 2016 LeadCommerce <amahrt@leadcommerce.de>
 */
class Base
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var array
     */
    protected $__custom = [];

    /**
     * Gets the attributes of this entity.
     *
     * @return array
     */
    public function getArrayCopy()
    {
        $properties = get_object_vars($this);
        unset($properties['__custom']);
        $properties = array_merge($this->__custom, $properties);

        $properties = array_filter($properties, function ($value) {
            return (!is_null($value));
        });

        foreach ($properties as $key => &$value) {
            if ($value instanceof Base) {
                $properties[$key] = $value->getArrayCopy();
            } else if (is_array($value)) {
                foreach ($value as $k => $v) {
                    if ($v instanceof Base) {
                        $value[$k] = $v->getArrayCopy();
                    }
                }
            }
        }

        return $properties;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     *
     * @return Base
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @param string $key
     * @return bool
     */
    public function has(string $key): bool
    {
        return (isset($this->__custom[$key]));
    }

    /**
     * @param string $key
     * @return mixed
     */
    public function get(string $key)
    {
        return $this->__custom[$key];
    }

    /**
     * @param string $key
     * @param mixed $value
     * @return $this
     */
    public function set(string $key, $value)
    {
        $this->__custom[$key] = $value;
        return $this;
    }
}
