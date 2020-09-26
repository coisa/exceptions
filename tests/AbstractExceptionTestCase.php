<?php

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
    abstract function getExceptionClass();

    public function testExceptionImplementInterfaces()
    {
        $exceptionClass = $this->getExceptionClass();
        $exception = new $exceptionClass();

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

        $exception = $exceptionClass::create($message, $code, $previous);

        self::assertInstanceOf($exceptionClass, $exception);
    }
}
