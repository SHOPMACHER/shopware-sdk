<?php

namespace LeadCommerce\Tests\Unit\Entity;

use LeadCommerce\Shopware\SDK\Entity\Base;
use PHPUnit\Framework\TestCase;

/**
 * Class BaseTest
 * @package LeadCommerce\Tests\Unit\Entity
 */
class BaseTest extends TestCase
{
    /**
     * @covers \LeadCommerce\Shopware\SDK\Entity\Base
     */
    public function testConstructor()
    {
        $base = new Base();

        self::assertNull($base->getId());
        $key = uniqid();
        self::assertFalse($base->has($key));
    }

    /**
     * @covers \LeadCommerce\Shopware\SDK\Entity\Base
     */
    public function testGetterAndSetter()
    {
        $base = new Base();

        $id = uniqid();
        self::assertSame($base, $base->setId($id));
        self::assertSame($id, $base->getId());

        $key = uniqid();
        $value = uniqid();
        self::assertSame($base, $base->set($key, $value));
        self::assertSame($value, $base->get($key));
    }

    /**
     * @covers \LeadCommerce\Shopware\SDK\Entity\Base
     */
    public function testGetArrayCopy()
    {
        $base = new Base();

        $id = uniqid();
        $key = uniqid();
        $value = uniqid();

        $base->setId($id)
            ->set($key, $value);

        self::assertEquals([
            'id' => $id,
            $key => $value
        ], $base->getArrayCopy());
    }
}
