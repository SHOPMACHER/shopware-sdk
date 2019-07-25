<?php

namespace LeadCommerce\Tests\Unit\Entity;

use LeadCommerce\Shopware\SDK\Entity\ArticleAttribute;
use PHPUnit\Framework\TestCase;

/**
 * Class ArticleAttributeTest
 * @package LeadCommerce\Tests\Unit\Entity
 */
class ArticleAttributeTest extends TestCase
{
    /**
     * @covers \LeadCommerce\Shopware\SDK\Entity\ArticleAttribute
     */
    public function testConstructor()
    {
        $attribute = new ArticleAttribute();

        self::assertNull($attribute->getArticleId());
        self::assertNull($attribute->getArticleDetailId());

        $attributes = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20];
        array_map(function ($item) use ($attribute) {
            $getter = sprintf('getAttr%s', $item);
            self::assertNull($attribute->$getter());
        }, $attributes);
    }

    /**
     * @covers \LeadCommerce\Shopware\SDK\Entity\ArticleAttribute
     */
    public function testGetterAndSetter()
    {
        $attribute = new ArticleAttribute();

        $id = uniqid();
        self::assertSame($attribute, $attribute->setArticleId($id));
        self::assertSame($id, $attribute->getArticleId());

        $id = uniqid();
        self::assertSame($attribute, $attribute->setArticleDetailId($id));
        self::assertSame($id, $attribute->getArticleDetailId());

        $attributes = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20];
        array_map(function ($item) use ($attribute) {
            $id = uniqid();
            $setter = sprintf('setAttr%s', $item);
            $getter = sprintf('getAttr%s', $item);
            self::assertSame($attribute, $attribute->$setter($id));
            self::assertSame($id, $attribute->$getter());
        }, $attributes);
    }

    /**
     * @covers \LeadCommerce\Shopware\SDK\Entity\ArticleAttribute
     */
    public function testCustomAttributes()
    {
        $attribute = new ArticleAttribute();

        $key = uniqid();
        $value = uniqid();
        self::assertSame($attribute, $attribute->set($key, $value));
        self::assertSame($value, $attribute->get($key));
    }

    /**
     * @covers \LeadCommerce\Shopware\SDK\Entity\ArticleAttribute
     */
    public function testGetArrayCopy()
    {
        $attribute = new ArticleAttribute();
        self::assertEmpty($attribute->getArrayCopy());

        $id = uniqid();
        $attribute->setAttr4($id);
        self::assertSame(['attr4' => $id], $attribute->getArrayCopy());

        $key = uniqid();
        $value = uniqid();
        $attribute->set($key, $value);
        self::assertSame([
            'attr4' => $id,
            $key => $value
        ], $attribute->getArrayCopy());
    }
}
