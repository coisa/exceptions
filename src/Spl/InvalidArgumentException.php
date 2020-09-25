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

use CoiSA\Exception\ExceptionInterface;

/**
 * Class InvalidArgumentException
 *
 * @package CoiSA\Exception\Spl
 */
class InvalidArgumentException extends \InvalidArgumentException implements ExceptionInterface
{
    /** @const string */
    const TEMPLATE_EXPECTED_CALLABLE_ARGUMENT = 'Given argument "%s" are not a valid callable function.';

    /**
     * {@inheritDoc}
     */
    public static function create($message, $code = 0, \Exception $previous = null)
    {
        $exceptionClass = \get_called_class();

        return new $exceptionClass($message, $code, $previous);
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
