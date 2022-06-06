<?php

declare(strict_types=1);

/**
 * This file is part of coisa/exceptions.
 *
 * This source file is subject to the license that is bundled
 * with this source code in the file LICENSE.
 *
 * @link      https://github.com/coisa/exceptions
 * @copyright Copyright (c) 2020-2022 Felipe Sayão Lobato Abreu <github@felipeabreu.com.br>
 * @license   https://opensource.org/licenses/MIT MIT License
 */

namespace CoiSA\Exception\Spl;

use CoiSA\Exception\ExceptionInterface;

/**
 * Class ReflectionException.
 *
 * @package CoiSA\Exception\Spl
 */
class ReflectionException extends \ReflectionException implements ExceptionInterface
{
    /** @const string */
    public const MESSAGE_CLASS_NOT_FOUND = 'Class "%s" not found!';

    /** @const string */
    public const MESSAGE_CLASS_NOT_SUBCLASS_OF = 'Given class "%s" are not a subclass of "%s".';

    /**
     * {@inheritdoc}
     */
    public static function create($message, $code = 0, $previous = null)
    {
        $exceptionClass = static::class;

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
        $message = sprintf(
            self::MESSAGE_CLASS_NOT_FOUND,
            $class
        );

        return self::create($message, $code, $previous);
    }

    /**
     * @param string                     $class
     * @param string                     $subclass
     * @param int                        $code
     * @param null|\Exception|\Throwable $previous
     *
     * @return \CoiSA\Factory\Exception\ReflectionException
     */
    public static function forClassNotSubclassOf($class, $subclass, $code = 0, $previous = null)
    {
        $message = sprintf(
            self::MESSAGE_CLASS_NOT_SUBCLASS_OF,
            $class,
            $subclass
        );

        return self::create($message, $code, $previous);
    }
}
