<?php

/**
 * This file is part of coisa/exceptions.
 *
 * This source file is subject to the license that is bundled
 * with this source code in the file LICENSE.
 *
 * @link      https://github.com/coisa/exceptions
 *
 * @copyright Copyright (c) 2020 Felipe Sayão Lobato Abreu <github@felipeabreu.com.br>
 * @license   https://opensource.org/licenses/MIT MIT License
 */
namespace CoiSA\Exception\Container;

use CoiSA\Exception\ExceptionInterface;
use Psr\Container\ContainerExceptionInterface;

/**
 * Class ContainerException.
 *
 * @package CoiSA\Exception\Container
 */
class ContainerException extends \Exception implements ExceptionInterface, ContainerExceptionInterface
{
    /**
     * @const string
     */
    const MESSAGE_EXCEPTION_RESOLVING_IDENTIFIER = 'Error message "%s" while retrieving the entry "%s".';

    /**
     * {@inheritdoc}
     */
    public static function create($message, $code = 0, $previous = null)
    {
        $exceptionClass = \get_called_class();

        return new $exceptionClass($message, $code, $previous);
    }

    /**
     * @param \Exception|\Throwable $exception
     * @param string                $id
     * @param int                   $code
     *
     * @return ContainerException
     */
    public static function forExceptionResolvingIdentifier($exception, $id, $code = 0)
    {
        $message = \sprintf(
            self::MESSAGE_EXCEPTION_RESOLVING_IDENTIFIER,
            $exception->getMessage(),
            $id
        );

        return self::create($message, $code, $exception);
    }
}
