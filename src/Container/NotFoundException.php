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

use Psr\Container\NotFoundExceptionInterface;

/**
 * Class NotFoundException.
 *
 * @package CoiSA\Exception\Container
 */
class NotFoundException extends ContainerException implements NotFoundExceptionInterface
{
    /**
     * @const string
     */
    const MESSAGE_NOT_FOUND_IDENTIFIER_FACTORY = 'No entry was found for "%s" identifier.';

    /**
     * {@inheritdoc}
     */
    public static function create($message, $code = 0, $previous = null)
    {
        $exceptionClass = \get_called_class();

        return new $exceptionClass($message, $code, $previous);
    }

    /**
     * @param string                     $id
     * @param int                        $code
     * @param null|\Exception|\Throwable $previous
     *
     * @return NotFoundException
     */
    public static function forNotFoundIdentifierFactory($id, $code = 0, $previous = null)
    {
        $message = \sprintf(
            self::MESSAGE_NOT_FOUND_IDENTIFIER_FACTORY,
            $id
        );

        return self::create($message, $code, $previous);
    }
}
