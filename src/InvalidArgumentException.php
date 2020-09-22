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
 * Class InvalidArgumentException
 *
 * @package CoiSA\ExceptionFactory
 */
class InvalidArgumentException extends \InvalidArgumentException implements ExceptionInterface
{
    /** @const string */
    const TEMPLATE_EXPECTED_CALLABLE_ARGUMENT = 'Given argument "%s" are not a valid callable function.';

    /**
     * @param string          $message
     * @param int             $code
     * @param null|\Exception $previous
     *
     * @return InvalidArgumentException
     *
     * @see ExceptionFactory::create()
     */
    public static function create($message, $code = 0, $previous = null)
    {
        $exceptionClass = \get_called_class();

        return ExceptionFactory::create($exceptionClass, $message, $code, $previous);
    }

    /**
     * @param string $message
     * @param int    $code
     *
     * @return InvalidArgumentException
     *
     * @see ExceptionFactory::fromPrevious()
     */
    public static function fromPrevious(\Exception $previous, $message = null, $code = null)
    {
        $exceptionClass = \get_called_class();
        $message        = $message ?: $previous->getMessage();
        $code           = $code ?: $previous->getCode();

        return ExceptionFactory::fromPrevious($exceptionClass, $previous, $message, $code);
    }

    /**
     * @param mixed                      $argument
     * @param int                        $code
     * @param null|\Exception|\Throwable $previous
     *
     * @return InvalidArgumentException
     */
    public static function forExpectedCallableArgument($argument, $code = 0, $previous = null)
    {
        $message = \sprintf(
            self::TEMPLATE_EXPECTED_CALLABLE_ARGUMENT,
            $argument
        );

        return self::create($message, $code, $previous);
    }
}
