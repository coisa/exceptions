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

/**
 * Class ExceptionFactory
 *
 * @package CoiSA\ExceptionFactory
 */
final class ExceptionFactory
{
    /**
     * @var string
     */
    private $exceptionClass;

    /**
     * ExceptionFactory constructor.
     *
     * @param string $exceptionClass
     */
    public function __construct($exceptionClass)
    {
        // @TODO validate exception class instanceOf \Exception
        $this->exceptionClass = $exceptionClass;
    }

    /**
     * @param string          $message
     * @param int             $code
     * @param null|\Exception $previous
     *
     * @return \Exception
     */
    public function __invoke($message, $code = 0, $previous = null)
    {
        $exceptionClass = $this->exceptionClass;

        return new $exceptionClass($message, $code, $previous);
    }

    /**
     * @param string          $exceptionClass
     * @param string          $message
     * @param int             $code
     * @param null|\Exception $previous
     *
     * @return \Exception
     */
    public static function create($exceptionClass, $message, $code = 0, $previous = null)
    {
        $exceptionFactory = new self($exceptionClass);

        return \call_user_func($exceptionFactory, $message, $code, $previous);
    }

    /**
     * @param string      $exceptionClass
     * @param \Exception  $previous
     * @param null|string $message
     * @param null|int    $code
     *
     * @return \Exception
     */
    public static function fromPrevious($exceptionClass, \Exception $previous, $message = null, $code = null)
    {
        return self::create(
            $exceptionClass,
            $message ?: $previous->getMessage(),
            $code ?: $previous->getCode(),
            $previous
        );
    }
}
