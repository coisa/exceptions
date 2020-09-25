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
 * Class ReflectionException
 *
 * @package CoiSA\Exception
 */
class ReflectionException extends \ReflectionException implements ExceptionInterface, ExceptionFactoryInterface
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
