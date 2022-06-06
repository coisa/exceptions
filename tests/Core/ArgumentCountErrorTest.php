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

namespace CoiSA\Exception\Core;

use CoiSA\Exception\AbstractExceptionTestCase;

/**
 * Class ArgumentCountErrorTest.
 *
 * @package CoiSA\Exception\Core
 *
 * @internal
 * @coversNothing
 */
final class ArgumentCountErrorTest extends AbstractExceptionTestCase
{
    public function getExceptionClass(): string
    {
        return ArgumentCountError::class;
    }

    public function testForExpectedNoArgumentWillReturnArgumentCountError(): void
    {
        $code     = random_int(1, 1000);
        $previous = new \Exception(
            uniqid('message', true),
            random_int(1, 1000)
        );

        /** @var ArgumentCountError $argumentCountError */
        $argumentCountError = ArgumentCountError::forExpectedNoArgument($code, $previous);

        parent::assertInstanceOf(ArgumentCountError::class, $argumentCountError);
        parent::assertSame(
            ArgumentCountError::MESSAGE_EXPECTED_NO_ARGUMENT,
            $argumentCountError->getMessage()
        );
        parent::assertSame($code, $argumentCountError->getCode());
        parent::assertSame($previous, $argumentCountError->getPrevious());
    }

    public function testForExpectedAtLeastWithLengthWillReturnArgumentCountErrorWithLengthOnMessage(): void
    {
        $length          = random_int(1, 1000);
        $expectedMessage = sprintf(ArgumentCountError::MESSAGE_EXPECTED_AT_LEAST, $length);
        $code            = random_int(1, 1000);
        $previous        = new \Exception(
            uniqid('message', true),
            random_int(1, 1000)
        );

        /** @var ArgumentCountError $argumentCountError */
        $argumentCountError = ArgumentCountError::forExpectedAtLeast($length, $code, $previous);

        parent::assertInstanceOf(ArgumentCountError::class, $argumentCountError);
        parent::assertSame(
            $expectedMessage,
            $argumentCountError->getMessage()
        );
        parent::assertSame($code, $argumentCountError->getCode());
        parent::assertSame($previous, $argumentCountError->getPrevious());
    }

    public function testForExpectedExactAmountWithLengthWillReturnArgumentCountErrorWithLengthOnMessage(): void
    {
        $length          = random_int(1, 1000);
        $expectedMessage = sprintf(ArgumentCountError::MESSAGE_EXPECTED_EXACT_AMOUNT, $length);
        $code            = random_int(1, 1000);
        $previous        = new \Exception(
            uniqid('message', true),
            random_int(1, 1000)
        );

        /** @var ArgumentCountError $argumentCountError */
        $argumentCountError = ArgumentCountError::forExpectedExactAmount($length, $code, $previous);

        parent::assertInstanceOf(ArgumentCountError::class, $argumentCountError);
        parent::assertSame(
            $expectedMessage,
            $argumentCountError->getMessage()
        );
        parent::assertSame($code, $argumentCountError->getCode());
        parent::assertSame($previous, $argumentCountError->getPrevious());
    }
}
