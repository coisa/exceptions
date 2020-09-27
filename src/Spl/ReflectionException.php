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
 * Class ReflectionException
 *
 * @package CoiSA\Exception\Spl
 */
class ReflectionException extends \ReflectionException implements ExceptionInterface
{
    /**
     * {@inheritDoc}
     */
    public static function create($message, $code = 0, \Throwable $previous = null)
    {
        $exceptionClass = \get_called_class();

        return new $exceptionClass($message, $code, $previous);
    }

    /**
     * @param string                     $class
     * @param int                        $code
     * @param null|\Exception|\Throwable $previous
     *
     * @return UnexpectedValueException
     */
    public static function forClassNotFound($class, $code = 0, $previous = null)
    {
        $message = \sprintf(
            'Class "%s" not found!',
            $class
        );

        return self::create($message, $code, $previous);
    }

    /**
     * @param string $class
     * @param string $subclass
     *
     * @return \CoiSA\Factory\Exception\ReflectionException
     */
    public static function forClassNotSubclassOf($class, $subclass)
    {
        $message = \sprintf(
            'Given class "%s" are not a subclass of "%s".',
            $class,
            $subclass
        );

        return self::create($message);
    }
}
