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

namespace CoiSA\Exception\Core;

use CoiSA\Exception\ExceptionInterface;

/**
 * Class ArgumentCountError
 *
 * @package CoiSA\Exception\Core
 */
class ArgumentCountError extends \ArgumentCountError implements ExceptionInterface
{
    /** @const string */
    const MESSAGE_EXPECTED_NO_ARGUMENT = 'This closure do not expect any argument.';

    /** @const string */
    const MESSAGE_EXPECTED_AT_LEAST = 'You should inform at least "%d" arguments.';

    /** @const string */
    const MESSAGE_EXPECTED_EXACT_AMOUNT = 'You should inform exactly "%d" arguments.';

    /**
     * {@inheritDoc}
     */
    public static function create($message, $code = 0, $previous = null)
    {
        $exceptionClass = \get_called_class();

        return new $exceptionClass($message, $code, $previous);
    }

    /**
     * @param int             $code
     * @param null|\Exception $previous
     *
     * @return ArgumentCountError
     */
    public static function forExpectedNoArgument($code = 0, \Exception $previous = null)
    {
        return self::create(self::MESSAGE_EXPECTED_NO_ARGUMENT, $code, $previous);
    }

    /**
     * @param int             $length
     * @param int             $code
     * @param null|\Exception $previous
     *
     * @return ArgumentCountError
     */
    public static function forExpectedAtLeast($length = 1, $code = 0, \Exception $previous = null)
    {
        $message = \sprintf(
            self::MESSAGE_EXPECTED_AT_LEAST,
            $length
        );

        return self::create($message, $code, $previous);
    }

    /**
     * @param int             $length
     * @param int             $code
     * @param null|\Exception $previous
     *
     * @return ArgumentCountError
     */
    public static function forExpectedExactAmount($length = 1, $code = 0, \Exception $previous = null)
    {
        $message = \sprintf(
            self::MESSAGE_EXPECTED_EXACT_AMOUNT,
            $length
        );

        return self::create($message, $code, $previous);
    }
}
