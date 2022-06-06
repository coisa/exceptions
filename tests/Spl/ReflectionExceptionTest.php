<?php

declare(strict_types=1);

/**
 * This file is part of coisa/exceptions.
 *
 * This source file is subject to the license that is bundled
 * with this source code in the file LICENSE.
 *
 * @link      https://github.com/coisa/exceptions
 * @copyright Copyright (c) 2020-2022 Felipe Sayão Lobato Abreu <github@felipeabreu.com.br>
 * @license   https://opensource.org/licenses/MIT MIT License
 */

namespace CoiSA\Exception\Spl;

use CoiSA\Exception\AbstractExceptionTestCase;

/**
 * Class ReflectionExceptionTest.
 *
 * @package CoiSA\Exception\Spl
 *
 * @internal
 * @coversDefaultClass \CoiSA\Exception\Spl\ReflectionException
 */
final class ReflectionExceptionTest extends AbstractExceptionTestCase
{
    public function getExceptionClass(): string
    {
        return ReflectionException::class;
    }

    public function testForClassNotFoundWillReturnReflectionException(): void
    {
        $class    = uniqid('class', true);
        $code     = random_int(1, 1000);
        $previous = new \Exception(
            uniqid('message', true),
            random_int(1, 1000)
        );

        /** @var ReflectionException $reflectionException */
        $reflectionException = ReflectionException::forClassNotFound($class, $code, $previous);

        parent::assertInstanceOf(ReflectionException::class, $reflectionException);
        parent::assertSame(
            sprintf(ReflectionException::MESSAGE_CLASS_NOT_FOUND, $class),
            $reflectionException->getMessage()
        );
        parent::assertSame($code, $reflectionException->getCode());
        parent::assertSame($previous, $reflectionException->getPrevious());
    }

    public function testForClassNotSubclassOfWillReturnReflectionException(): void
    {
        $class    = uniqid('class', true);
        $subclass = uniqid('subclass', true);
        $code     = random_int(1, 1000);
        $previous = new \Exception(
            uniqid('message', true),
            random_int(1, 1000)
        );

        /** @var ReflectionException $reflectionException */
        $reflectionException = ReflectionException::forClassNotSubclassOf($class, $subclass, $code, $previous);

        parent::assertInstanceOf(ReflectionException::class, $reflectionException);
        parent::assertSame(
            sprintf(ReflectionException::MESSAGE_CLASS_NOT_SUBCLASS_OF, $class, $subclass),
            $reflectionException->getMessage()
        );
        parent::assertSame($code, $reflectionException->getCode());
        parent::assertSame($previous, $reflectionException->getPrevious());
    }
}
