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
 * Class BadFunctionCallException
 *
 * @package CoiSA\ExceptionFactory
 */
class BadFunctionCallException extends \BadFunctionCallException implements ExceptionInterface
{
    /** @const string */
    const TEMPLATE_EXPECTED_AT_LEAST_ONE_ARGUMENT = 'You should inform at least one argument.';

    /**
     * {@inheritDoc}
     */
    public static function create($message, $code = 0, \Exception $previous = null)
    {
        $exceptionClass = \get_called_class();

        return new $exceptionClass($message, $code, $previous);
    }

    /**
     * @param int                        $code
     * @param null|\Exception|\Throwable $previous
     *
     * @return BadFunctionCallException
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
