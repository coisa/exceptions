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
 * Class BadMethodCallException
 *
 * @package CoiSA\ExceptionFactory
 */
class BadMethodCallException extends \BadMethodCallException implements ExceptionInterface
{
    /** @const string */
    const TEMPLATE_EXPECTED_AT_LEAST_ONE_ARGUMENT = 'You should inform at least one argument.';

    /**
     * @param string          $message
     * @param int             $code
     * @param null|\Exception $previous
     *
     * @return BadMethodCallException
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
     * @return BadMethodCallException
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
     * @param int                        $code
     * @param null|\Exception|\Throwable $previous
     *
     * @return BadMethodCallException
     */
    public static function forExpectedAtLeaseOneArgument($code = 0, $previous = null)
    {
        return self::create(
            self::TEMPLATE_EXPECTED_AT_LEAST_ONE_ARGUMENT,
            $code,
            $previous
        );
    }
}
