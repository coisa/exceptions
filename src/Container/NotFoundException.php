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

namespace CoiSA\Exception\Container;

use CoiSA\Exception\ExceptionTrait;
use Psr\Container\NotFoundExceptionInterface;

/**
 * Class NotFoundException.
 *
 * @package CoiSA\Exception\Container
 */
class NotFoundException extends ContainerException implements NotFoundExceptionInterface
{
    use ExceptionTrait;

    /**
     * @const string
     */
    public const MESSAGE_NOT_FOUND_IDENTIFIER_FACTORY = 'No entry was found for "%s" identifier.';

    public static function forNotFoundIdentifierFactory(string $id, int $code = 0, \Throwable $previous = null): self
    {
        $message = sprintf(
            self::MESSAGE_NOT_FOUND_IDENTIFIER_FACTORY,
            $id
        );

        return self::create($message, $code, $previous);
    }
}
