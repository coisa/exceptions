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

use CoiSA\Exception\ExceptionInterface;
use CoiSA\Exception\ExceptionTrait;
use Psr\Container\ContainerExceptionInterface;

/**
 * Class ContainerException.
 *
 * @package CoiSA\Exception\Container
 */
class ContainerException extends \Exception implements ExceptionInterface, ContainerExceptionInterface
{
    use ExceptionTrait;

    /**
     * @const string
     */
    public const MESSAGE_EXCEPTION_RESOLVING_IDENTIFIER = 'Error message "%s" while retrieving the entry "%s".';

    public static function forExceptionResolvingIdentifier(\Throwable $exception, string $id, int $code = 0): self
    {
        $message = sprintf(
            self::MESSAGE_EXCEPTION_RESOLVING_IDENTIFIER,
            $exception->getMessage(),
            $id
        );

        return self::create($message, $code, $exception);
    }
}
