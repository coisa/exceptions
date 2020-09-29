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

    public function providePreviousException()
    {
        $message = \uniqid('previous message', true);
        $code    = \mt_rand(1, 1000);

        return array(
            array(new \Exception($message, $code)),
            array(new Container\ContainerException($message, $code)),
            array(new Container\NotFoundException($message, $code)),
            array(new Core\ArgumentCountError($message, $code)),
            array(new Core\ArithmeticError($message, $code)),
            array(new Core\AssertionError($message, $code)),
            array(new Core\CompileError($message, $code)),
            array(new Core\DivisionByZeroError($message, $code)),
            array(new Core\Error($message, $code)),
            array(new Core\Exception($message, $code)),
            array(new Core\ParseError($message, $code)),
            array(new Core\TypeError($message, $code)),
            array(new Json\JsonException($message, $code)),
            array(new Spl\BadFunctionCallException($message, $code)),
            array(new Spl\BadMethodCallException($message, $code)),
            array(new Spl\DomainException($message, $code)),
            array(new Spl\InvalidArgumentException($message, $code)),
            array(new Spl\LengthException($message, $code)),
            array(new Spl\LogicException($message, $code)),
            array(new Spl\OutOfBoundsException($message, $code)),
            array(new Spl\OutOfRangeException($message, $code)),
            array(new Spl\OverflowException($message, $code)),
            array(new Spl\RangeException($message, $code)),
            array(new Spl\ReflectionException($message, $code)),
            array(new Spl\RuntimeException($message, $code)),
            array(new Spl\UnderflowException($message, $code)),
            array(new Spl\UnexpectedValueException($message, $code)),
        );
    }

    public function testExceptionImplementInterfaces()
    {
        $exceptionClass = $this->getExceptionClass();
        $exception      = new $exceptionClass();

        self::assertInstanceOf('Throwable', $exception);
        self::assertInstanceOf('CoiSA\\Exception\\Throwable', $exception);
        self::assertInstanceOf('CoiSA\\Exception\\ExceptionInterface', $exception);
    }

    public function testCreateWillReturnInstanceOfSameException()
    {
        $exceptionClass = $this->getExceptionClass();

        /** @var \Throwable $exception */
        $exception = $exceptionClass::create(\uniqid('message', true));

        self::assertInstanceOf($exceptionClass, $exception);
    }

    public function testCreateWillReturnExceptionWithGivenMessage()
    {
        $message = \uniqid('message', true);

        $exceptionClass = $this->getExceptionClass();

        /** @var \Throwable $exception */
        $exception = $exceptionClass::create($message);

        self::assertEquals($message, $exception->getMessage());
    }

    public function testCreateWithoutCodeWillReturnExceptionWithZeroCode()
    {
        $exceptionClass = $this->getExceptionClass();

        /** @var \Throwable $exception */
        $exception = $exceptionClass::create(
            \uniqid('message', true),
            null
        );

        self::assertEquals(0, $exception->getCode());
    }

    public function testCreateWithCodeWillReturnExceptionWithGivenCode()
    {
        $message  = \uniqid('message', true);
        $code     = \mt_rand(1, 1000);

        $exceptionClass = $this->getExceptionClass();

        /** @var \Throwable $exception */
        $exception = $exceptionClass::create($message, $code);

        self::assertEquals($code, $exception->getCode());
    }

    /**
     * @dataProvider providePreviousException
     *
     * @param mixed $previous
     */
    public function testCreateWithPreviousWillReturnExceptionWithGivenPrevious($previous)
    {
        $message        = \uniqid('message', true);
        $exceptionClass = $this->getExceptionClass();

        /** @var \Throwable $exception */
        $exception = $exceptionClass::create($message, null, $previous);

        self::assertSame($previous, $exception->getPrevious());
    }
}
