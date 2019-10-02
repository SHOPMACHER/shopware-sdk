<?php

namespace LeadCommerce\Shopware\SDK\Entity;

/**
 * Class CategoryAttribute
 * @package LeadCommerce\Shopware\SDK\Entity
 */
class CategoryAttribute extends Base
{
    /**
     * @var int
     */
    protected $categoryId;
    /**
     * @var mixed
     */
    protected $attribute1;
    /**
     * @var mixed
     */
    protected $attribute2;
    /**
     * @var mixed
     */
    protected $attribute3;
    /**
     * @var mixed
     */
    protected $attribute4;
    /**
     * @var mixed
     */
    protected $attribute5;
    /**
     * @var mixed
     */
    protected $attribute6;
    /**
     * @var bool
     */
    protected $isBrandCategory;
    /**
     * @var string
     */
    protected $merchandiseNumber;
   
    /**
     * @return int
     */
    public function getCategoryId(): int
    {
        return $this->categoryId;
    }
    
    /**
     * @param int $categoryId
     *
     * @return CategoryAttribute
     */
    public function setCategoryId(int $categoryId)
    {
        $this->categoryId = $categoryId;
        
        return $this;
    }
    
    /**
     * @return mixed
     */
    public function getAttribute1()
    {
        return $this->attribute1;
    }
    
    /**
     * @param mixed $attribute1
     *
     * @return CategoryAttribute
     */
    public function setAttribute1($attribute1)
    {
        $this->attribute1 = $attribute1;
        
        return $this;
    }
    
    /**
     * @return mixed
     */
    public function getAttribute2()
    {
        return $this->attribute2;
    }
    
    /**
     * @param mixed $attribute2
     *
     * @return CategoryAttribute
     */
    public function setAttribute2($attribute2)
    {
        $this->attribute2 = $attribute2;
        
        return $this;
    }
    
    /**
     * @return mixed
     */
    public function getAttribute3()
    {
        return $this->attribute3;
    }
    
    /**
     * @param mixed $attribute3
     *
     * @return CategoryAttribute
     */
    public function setAttribute3($attribute3)
    {
        $this->attribute3 = $attribute3;
        
        return $this;
    }
    
    /**
     * @return mixed
     */
    public function getAttribute4()
    {
        return $this->attribute4;
    }
    
    /**
     * @param mixed $attribute4
     *
     * @return CategoryAttribute
     */
    public function setAttribute4($attribute4)
    {
        $this->attribute4 = $attribute4;
        
        return $this;
    }
    
    /**
     * @return mixed
     */
    public function getAttribute5()
    {
        return $this->attribute5;
    }
    
    /**
     * @param mixed $attribute5
     *
     * @return CategoryAttribute
     */
    public function setAttribute5($attribute5)
    {
        $this->attribute5 = $attribute5;
        
        return $this;
    }
    
    /**
     * @return mixed
     */
    public function getAttribute6()
    {
        return $this->attribute6;
    }
    
    /**
     * @param mixed $attribute6
     *
     * @return CategoryAttribute
     */
    public function setAttribute6($attribute6)
    {
        $this->attribute6 = $attribute6;
        
        return $this;
    }
    
    /**
     * @return bool
     */
    public function isBrandCategory()
    {
        return $this->isBrandCategory;
    }
    
    /**
     * @param bool $isBrandCategory
     *
     * @return CategoryAttribute
     */
    public function setIsBrandCategory(bool $isBrandCategory)
    {
        $this->isBrandCategory = $isBrandCategory;
        
        return $this;
    }
    
    /**
     * @return string
     */
    public function getMerchandiseNumber()
    {
        return $this->merchandiseNumber;
    }
    
    /**
     * @param string $merchandiseNumber
     *
     * @return CategoryAttribute
     */
    public function setMerchandiseNumber(string $merchandiseNumber)
    {
        $this->merchandiseNumber = $merchandiseNumber;
        
        return $this;
    }
}
