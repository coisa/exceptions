<?php

/**
 * This file is part of coisa/exceptions.
 *
 * This source file is subject to the license that is bundled
 * with this source code in the file LICENSE.
 *
 * @link      https://github.com/coisa/exceptions
 *
 * @copyright Copyright (c) 2020 Felipe Sayão Lobato Abreu <github@felipeabreu.com.br>
 * @license   https://opensource.org/licenses/MIT MIT License
 */
namespace CoiSA\Exception\Spl;

use CoiSA\Exception\AbstractExceptionTestCase;

/**
 * Class ReflectionExceptionTest.
 *
 * @package CoiSA\Exception\Spl
 */
final class ReflectionExceptionTest extends AbstractExceptionTestCase
{
    /**
     * @return string
     */
    public function getExceptionClass()
    {
        return __NAMESPACE__ . '\\ReflectionException';
    }

    public function testForClassNotFoundWillReturnReflectionException()
    {
        $class    = \uniqid('class', true);
        $code     = \mt_rand(1, 1000);
        $previous = new \Exception(
            \uniqid('message', true),
            \mt_rand(1, 1000)
        );

        /** @var ReflectionException $reflectionException */
        $reflectionException = ReflectionException::forClassNotFound($class, $code, $previous);

        self::assertInstanceOf(__NAMESPACE__ . '\\ReflectionException', $reflectionException);
        self::assertEquals(
            \sprintf(ReflectionException::MESSAGE_CLASS_NOT_FOUND, $class),
            $reflectionException->getMessage()
        );
        self::assertEquals($code, $reflectionException->getCode());
        self::assertSame($previous, $reflectionException->getPrevious());
    }

    public function testForClassNotSubclassOfWillReturnReflectionException()
    {
        $class    = \uniqid('class', true);
        $subclass = \uniqid('subclass', true);
        $code     = \mt_rand(1, 1000);
        $previous = new \Exception(
            \uniqid('message', true),
            \mt_rand(1, 1000)
        );

        /** @var ReflectionException $reflectionException */
        $reflectionException = ReflectionException::forClassNotSubclassOf($class, $subclass, $code, $previous);

        self::assertInstanceOf(__NAMESPACE__ . '\\ReflectionException', $reflectionException);
        self::assertEquals(
            \sprintf(ReflectionException::MESSAGE_CLASS_NOT_SUBCLASS_OF, $class, $subclass),
            $reflectionException->getMessage()
        );
        self::assertEquals($code, $reflectionException->getCode());
        self::assertSame($previous, $reflectionException->getPrevious());
    }
}
