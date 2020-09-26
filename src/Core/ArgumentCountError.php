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
    /**
     * {@inheritDoc}
     */
    public static function create($message, $code = 0, \Exception $previous = null)
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
    public static function forExpectedZeroArgumentCount($code = 0, \Exception $previous = null)
    {
        return self::create('This closure do not expect any argument.', $code, $previous);
    }

    /**
     * @param int             $length
     * @param int             $code
     * @param null|\Exception $previous
     *
     * @return ArgumentCountError
     */
    public static function forExpectedCountLessThan($length = 1, $code = 0, \Exception $previous = null)
    {
        $message = \sprintf(
            'You should inform at least "%d" arguments.',
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
    public static function forExpectedExactCount($length = 1, $code = 0, \Exception $previous = null)
    {
        $message = \sprintf(
            'You should inform exactly "%d" arguments.',
            $length
        );

        return self::create($message, $code, $previous);
    }
}
