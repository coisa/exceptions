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
namespace CoiSA\Exception\Core;

use CoiSA\Exception\AbstractExceptionTestCase;

/**
 * Class ArgumentCountErrorTest.
 *
 * @package CoiSA\Exception\Core
 */
final class ArgumentCountErrorTest extends AbstractExceptionTestCase
{
    /**
     * @return string
     */
    public function getExceptionClass()
    {
        return __NAMESPACE__ . '\\ArgumentCountError';
    }

    public function testForExpectedNoArgumentWillReturnArgumentCountError()
    {
        $code     = \mt_rand(1, 1000);
        $previous = new \Exception(
            \uniqid('message', true),
            \mt_rand(1, 1000)
        );

        /** @var ArgumentCountError $argumentCountError */
        $argumentCountError = ArgumentCountError::forExpectedNoArgument($code, $previous);

        self::assertInstanceOf(__NAMESPACE__ . '\\ArgumentCountError', $argumentCountError);
        self::assertEquals(
            ArgumentCountError::MESSAGE_EXPECTED_NO_ARGUMENT,
            $argumentCountError->getMessage()
        );
        self::assertEquals($code, $argumentCountError->getCode());
        self::assertSame($previous, $argumentCountError->getPrevious());
    }

    public function testForExpectedAtLeastWithLengthWillReturnArgumentCountErrorWithLengthOnMessage()
    {
        $length          = \mt_rand(1, 1000);
        $expectedMessage = \sprintf(ArgumentCountError::MESSAGE_EXPECTED_AT_LEAST, $length);
        $code            = \mt_rand(1, 1000);
        $previous        = new \Exception(
            \uniqid('message', true),
            \mt_rand(1, 1000)
        );

        /** @var ArgumentCountError $argumentCountError */
        $argumentCountError = ArgumentCountError::forExpectedAtLeast($length, $code, $previous);

        self::assertInstanceOf(__NAMESPACE__ . '\\ArgumentCountError', $argumentCountError);
        self::assertEquals(
            $expectedMessage,
            $argumentCountError->getMessage()
        );
        self::assertEquals($code, $argumentCountError->getCode());
        self::assertSame($previous, $argumentCountError->getPrevious());
    }

    public function testForExpectedExactAmountWithLengthWillReturnArgumentCountErrorWithLengthOnMessage()
    {
        $length          = \mt_rand(1, 1000);
        $expectedMessage = \sprintf(ArgumentCountError::MESSAGE_EXPECTED_EXACT_AMOUNT, $length);
        $code            = \mt_rand(1, 1000);
        $previous        = new \Exception(
            \uniqid('message', true),
            \mt_rand(1, 1000)
        );

        /** @var ArgumentCountError $argumentCountError */
        $argumentCountError = ArgumentCountError::forExpectedExactAmount($length, $code, $previous);

        self::assertInstanceOf(__NAMESPACE__ . '\\ArgumentCountError', $argumentCountError);
        self::assertEquals(
            $expectedMessage,
            $argumentCountError->getMessage()
        );
        self::assertEquals($code, $argumentCountError->getCode());
        self::assertSame($previous, $argumentCountError->getPrevious());
    }
}
