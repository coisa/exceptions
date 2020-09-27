<?php

/**
 * This file is part of coisa/exceptions.
 *
 * This source file is subject to the license that is bundled
 * with this source code in the file LICENSE.
 *
 * @link      https://github.com/coisa/exceptions
 * @copyright Copyright (c) 2020 Felipe Sayão Lobato Abreu <github@felipeabreu.com.br>
 * @license   https://opensource.org/licenses/MIT MIT License
 */

namespace CoiSA\Exception\Spl;

use CoiSA\Exception\AbstractExceptionTestCase;

/**
 * Class InvalidArgumentExceptionTest
 *
 * @package CoiSA\Exception\Spl
 */
final class InvalidArgumentExceptionTest extends AbstractExceptionTestCase
{
    /**
     * @return string
     */
    public function getExceptionClass()
    {
        return __NAMESPACE__ . '\\InvalidArgumentException';
    }

    public function testForInvalidArgumentTypeWillReturnInvalidArgumentExceptionWithArgumentNameAndExpectedTypeOnMessage()
    {
        $argumentName = \uniqid('argumentName', true);
        $expectedType = \uniqid('expectedType', true);

        $expectedMessage = \sprintf(
            InvalidArgumentException::MESSAGE_INVALID_ARGUMENT_TYPE,
            $argumentName,
            $expectedType
        );
        $code            = \mt_rand(1, 1000);
        $previous        = new \Exception(
            \uniqid('message', true),
            \mt_rand(1, 1000)
        );

        /** @var InvalidArgumentException $invalidArgumentException */
        $invalidArgumentException = InvalidArgumentException::forInvalidArgumentType(
            $argumentName,
            $expectedType,
            $code,
            $previous
        );

        self::assertInstanceOf(__NAMESPACE__ . '\\InvalidArgumentException', $invalidArgumentException);
        self::assertEquals(
            $expectedMessage,
            $invalidArgumentException->getMessage()
        );
        self::assertEquals($code, $invalidArgumentException->getCode());
        self::assertSame($previous, $invalidArgumentException->getPrevious());
    }
}
