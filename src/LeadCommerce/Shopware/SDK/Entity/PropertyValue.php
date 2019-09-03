<?php
/**
 * LeadCommerce\Shopware\SDK\Entity
 *
 * Copyright 2016 LeadCommerce
 *
 * @author Alexander Mahrt <amahrt@leadcommerce.de>
 * @copyright 2016 LeadCommerce <amahrt@leadcommerce.de>
 */
namespace LeadCommerce\Shopware\SDK\Entity;

/**
 * Class PropertyValue
 */
class PropertyValue extends Base
{
    /**
     * @var int
     */
    protected $id;
    /**
     * @var float
     */
    protected $valueNumeric;
    /**
     * @var int
     */
    protected $position;
    /**
     * @var int
     */
    protected $optionId;
    /**
     * @var string
     */
    protected $value;
    /**
     * @var PropertyGroupOption
     */
    protected $option;
    /**
     * @var bool
     */
    protected $filterable;

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
     * @return PropertyValue
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return float
     */
    public function getValueNumeric()
    {
        return $this->valueNumeric;
    }

    /**
     * @param float $valueNumeric
     *
     * @return PropertyValue
     */
    public function setValueNumeric($valueNumeric)
    {
        $this->valueNumeric = $valueNumeric;

        return $this;
    }

    /**
     * @return int
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * @param int $position
     *
     * @return PropertyValue
     */
    public function setPosition($position)
    {
        $this->position = $position;

        return $this;
    }

    /**
     * @return int
     */
    public function getOptionId()
    {
        return $this->optionId;
    }

    /**
     * @param int $optionId
     *
     * @return PropertyValue
     */
    public function setOptionId($optionId)
    {
        $this->optionId = $optionId;

        return $this;
    }

    /**
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param string $value
     *
     * @return PropertyValue
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }
    
    /**
     * @return PropertyGroupOption
     */
    public function getOption()
    {
        return $this->option;
    }
    
    /**
     * @param PropertyGroupOption $option
     *
     * @return PropertyValue
     */
    public function setOption(PropertyGroupOption $option)
    {
        $this->option = $option;
        
        return $this;
    }
    
    /**
     * @return bool
     */
    public function isFilterable()
    {
        return $this->filterable;
    }
    
    /**
     * @param bool $filterable
     *
     * @return PropertyValue
     */
    public function setFilterable(bool $filterable)
    {
        $this->filterable = $filterable;
        
        return $this;
    }
}
