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
 * Class InvalidArgumentExceptionTest.
 *
 * @package CoiSA\Exception\Spl
 *
 * @internal
 * @coversNothing
 */
final class InvalidArgumentExceptionTest extends AbstractExceptionTestCase
{
    public function getExceptionClass(): string
    {
        return InvalidArgumentException::class;
    }

    public function testForInvalidArgumentTypeWillReturnInvalidArgumentExceptionWithArgumentNameAndExpectedTypeOnMessage(): void
    {
        $argumentName = uniqid('argumentName', true);
        $expectedType = uniqid('expectedType', true);

        $expectedMessage = sprintf(
            InvalidArgumentException::MESSAGE_INVALID_ARGUMENT_TYPE,
            $argumentName,
            $expectedType
        );
        $code            = random_int(1, 1000);
        $previous        = new \Exception(
            uniqid('message', true),
            random_int(1, 1000)
        );

        /** @var InvalidArgumentException $invalidArgumentException */
        $invalidArgumentException = InvalidArgumentException::forInvalidArgumentType(
            $argumentName,
            $expectedType,
            $code,
            $previous
        );

        parent::assertInstanceOf(InvalidArgumentException::class, $invalidArgumentException);
        parent::assertSame(
            $expectedMessage,
            $invalidArgumentException->getMessage()
        );
        parent::assertSame($code, $invalidArgumentException->getCode());
        parent::assertSame($previous, $invalidArgumentException->getPrevious());
    }
}
