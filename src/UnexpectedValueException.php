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
 * Class UnexpectedValueException
 *
 * @package CoiSA\ExceptionFactory
 */
class UnexpectedValueException extends \UnexpectedValueException implements ExceptionInterface
{
    /** @const string */
    const TEMPLATE_MESSAGE_EXPECTED_CLASS_IMPLEMENTS = 'Expected class "%s" to implement "%s".';

    /** @const string */
    const TEMPLATE_MESSAGE_CLASS_NOT_FOUND = 'Class "%s" not found!';

    /**
     * @param string          $message
     * @param int             $code
     * @param null|\Exception $previous
     *
     * @return UnexpectedValueException
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
     * @return UnexpectedValueException
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
     * @param string                     $class
     * @param string                     $implements
     * @param int                        $code
     * @param null|\Exception|\Throwable $previous
     *
     * @return UnexpectedValueException
     */
    public static function forExpectedClassImplements($class, $implements, $code = 0, $previous = null)
    {
        $message = \sprintf(
            self::TEMPLATE_MESSAGE_EXPECTED_CLASS_IMPLEMENTS,
            $class,
            $implements
        );

        return self::create($message, $code, $previous);
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
            self::TEMPLATE_MESSAGE_CLASS_NOT_FOUND,
            $class
        );

        return self::create($message, $code, $previous);
    }
}
