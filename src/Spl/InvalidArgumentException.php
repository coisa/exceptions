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
use CoiSA\Exception\ExceptionTrait;

/**
 * Class InvalidArgumentException.
 *
 * @package CoiSA\Exception\Spl
 */
class InvalidArgumentException extends \InvalidArgumentException implements ExceptionInterface
{
    use ExceptionTrait;

    /** @const string */
    public const MESSAGE_INVALID_ARGUMENT_TYPE = 'Given argument "%s" should be of type "%s".';

    public static function forInvalidArgumentType(
        string $argumentName,
        string $expectedType,
        int $code = 0,
        \Throwable $previous = null
    ): self {
        $message = sprintf(
            self::MESSAGE_INVALID_ARGUMENT_TYPE,
            $argumentName,
            $expectedType
        );

        return self::create($message, $code, $previous);
    }
}
