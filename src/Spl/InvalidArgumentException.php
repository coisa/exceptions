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
    /**
     * {@inheritDoc}
     */
    public static function create($message, $code = 0, \Exception $previous = null)
    {
        $exceptionClass = \get_called_class();

        return new $exceptionClass($message, $code, $previous);
    }

    /**
     * @param string          $argument
     * @param string          $type
     * @param int             $code
     * @param null|\Exception $previous
     *
     * @return InvalidArgumentException
     */
    public static function forExpectedArgumentType($argument, $type, $code = 0, $previous = null)
    {
        $message = \sprintf(
            'Given argument "%s" should be of type "%s".',
            $argument,
            $type
        );

        return self::create($message, $code, $previous);
    }
}
