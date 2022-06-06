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

namespace CoiSA\Exception;

use PHPUnit\Framework\TestCase;

/**
 * Class AbstractExceptionTestCase.
 *
 * @package CoiSA\Exception
 */
abstract class AbstractExceptionTestCase extends TestCase
{
    abstract public function getExceptionClass(): string;

    public function providePreviousException()
    {
        $message = uniqid('previous message', true);
        $code    = random_int(1, 1000);

        return [
            [new \Exception($message, $code)],
            [new Container\ContainerException($message, $code)],
            [new Container\NotFoundException($message, $code)],
            [new Core\ArgumentCountError($message, $code)],
            [new Core\ArithmeticError($message, $code)],
            [new Core\AssertionError($message, $code)],
            [new Core\CompileError($message, $code)],
            [new Core\DivisionByZeroError($message, $code)],
            [new Core\Error($message, $code)],
            [new Core\Exception($message, $code)],
            [new Core\ParseError($message, $code)],
            [new Core\TypeError($message, $code)],
            [new Json\JsonException($message, $code)],
            [new Spl\BadFunctionCallException($message, $code)],
            [new Spl\BadMethodCallException($message, $code)],
            [new Spl\DomainException($message, $code)],
            [new Spl\InvalidArgumentException($message, $code)],
            [new Spl\LengthException($message, $code)],
            [new Spl\LogicException($message, $code)],
            [new Spl\OutOfBoundsException($message, $code)],
            [new Spl\OutOfRangeException($message, $code)],
            [new Spl\OverflowException($message, $code)],
            [new Spl\RangeException($message, $code)],
            [new Spl\ReflectionException($message, $code)],
            [new Spl\RuntimeException($message, $code)],
            [new Spl\UnderflowException($message, $code)],
            [new Spl\UnexpectedValueException($message, $code)],
        ];
    }

    /**
     * @coversNothing
     */
    public function testExceptionImplementInterfaces(): void
    {
        $exceptionClass = $this->getExceptionClass();
        $exception      = new $exceptionClass();

        parent::assertInstanceOf(\Throwable::class, $exception);
        parent::assertInstanceOf(Throwable::class, $exception);
        parent::assertInstanceOf(ExceptionInterface::class, $exception);
    }

    /**
     * @covers ::create
     */
    public function testCreateWillReturnInstanceOfSameException(): void
    {
        $exceptionClass = $this->getExceptionClass();

        /** @var ExceptionInterface $exception */
        $exception = $exceptionClass::create(uniqid('message', true));

        parent::assertInstanceOf($exceptionClass, $exception);
    }

    /**
     * @covers ::create
     */
    public function testCreateWillReturnExceptionWithGivenMessage(): void
    {
        $message = uniqid('message', true);

        $exceptionClass = $this->getExceptionClass();

        /** @var ExceptionInterface $exception */
        $exception = $exceptionClass::create($message);

        parent::assertSame($message, $exception->getMessage());
    }

    /**
     * @covers ::create
     */
    public function testCreateWithoutCodeWillReturnExceptionWithZeroCode(): void
    {
        $exceptionClass = $this->getExceptionClass();

        /** @var ExceptionInterface $exception */
        $exception = $exceptionClass::create(uniqid('message', true));

        parent::assertSame(0, $exception->getCode());
    }

    /**
     * @covers ::create
     */
    public function testCreateWithCodeWillReturnExceptionWithGivenCode(): void
    {
        $message  = uniqid('message', true);
        $code     = random_int(1, 1000);

        $exceptionClass = $this->getExceptionClass();

        /** @var ExceptionInterface $exception */
        $exception = $exceptionClass::create($message, $code);

        parent::assertSame($code, $exception->getCode());
    }

    /**
     * @dataProvider providePreviousException
     * @covers ::create
     */
    public function testCreateWithPreviousWillReturnExceptionWithGivenPrevious(\Throwable $previous): void
    {
        $message        = uniqid('message', true);
        $exceptionClass = $this->getExceptionClass();

        /** @var ExceptionInterface $exception */
        $exception = $exceptionClass::create($message, 0, $previous);

        parent::assertSame($previous, $exception->getPrevious());
    }

    /**
     * @dataProvider providePreviousException
     * @covers ::createFromThrowable
     */
    public function testCreateFromThrowableWillReturnExceptionWithMessageCodeFromPrevious(\Throwable $throwable): void
    {
        $exceptionClass = $this->getExceptionClass();

        /** @var ExceptionInterface $exception */
        $exception = $exceptionClass::createFromThrowable($throwable);

        parent::assertSame($throwable, $exception->getPrevious());
        parent::assertSame($throwable->getMessage(), $exception->getMessage());
        parent::assertSame($throwable->getCode(), $exception->getCode());
    }

    /**
     * @covers ::throw
     */
    public function testThrowWillThrowExceptionWithGivenMessageAndCode(): void
    {
        $message        = uniqid('message', true);
        $code           = random_int(1, 1000);
        $exceptionClass = $this->getExceptionClass();

        parent::expectException($exceptionClass);
        parent::expectExceptionMessage($message);
        parent::expectExceptionCode($code);

        $exceptionClass::throw($message, $code);
    }
}
