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

namespace CoiSA\Exception;

use PHPUnit\Framework\TestCase;

/**
 * Class AbstractExceptionTestCase
 *
 * @package CoiSA\Exception
 */
abstract class AbstractExceptionTestCase extends TestCase
{
    /**
     * @return string
     */
    abstract public function getExceptionClass();

    public function testExceptionImplementInterfaces()
    {
        $exceptionClass = $this->getExceptionClass();
        $exception      = new $exceptionClass();

        self::assertInstanceOf('Throwable', $exception);
        self::assertInstanceOf('CoiSA\\Exception\\Throwable', $exception);
        self::assertInstanceOf('CoiSA\\Exception\\ExceptionInterface', $exception);
    }

    public function testCreateWillReturnCustomException()
    {
        $exceptionClass = $this->getExceptionClass();

        $message  = \uniqid('message', true);
        $code     = \mt_rand(1, 1000);
        $previous = new \Exception();

        /** @var \Throwable $exception */
        $exception = $exceptionClass::create($message, $code, $previous);

        self::assertInstanceOf($exceptionClass, $exception);
        self::assertEquals($message, $exception->getMessage());
        self::assertEquals($code, $exception->getCode());
        self::assertSame($previous, $exception->getPrevious());
    }
}
