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

namespace CoiSA\Exception\Core;

use CoiSA\Exception\ExceptionInterface;

/**
 * Class ArgumentCountError.
 *
 * @package CoiSA\Exception\Core
 */
class ArgumentCountError extends \ArgumentCountError implements ExceptionInterface
{
    /** @const string */
    public const MESSAGE_EXPECTED_NO_ARGUMENT = 'This closure do not expect any argument.';

    /** @const string */
    public const MESSAGE_EXPECTED_AT_LEAST = 'You should inform at least "%d" arguments.';

    /** @const string */
    public const MESSAGE_EXPECTED_EXACT_AMOUNT = 'You should inform exactly "%d" arguments.';

    /**
     * {@inheritdoc}
     */
    public static function create(string $message, int $code = 0, \Throwable $previous = null): self
    {
        return new self($message, $code, $previous);
    }

    public static function forExpectedNoArgument(int $code = 0, \Throwable $previous = null): self
    {
        return self::create(self::MESSAGE_EXPECTED_NO_ARGUMENT, $code, $previous);
    }

    public static function forExpectedAtLeast(int $length = 1, int $code = 0, \Throwable $previous = null): self
    {
        $message = sprintf(
            self::MESSAGE_EXPECTED_AT_LEAST,
            $length
        );

        return self::create($message, $code, $previous);
    }

    public static function forExpectedExactAmount(int $length = 1, int $code = 0, \Throwable $previous = null): self
    {
        $message = sprintf(
            self::MESSAGE_EXPECTED_EXACT_AMOUNT,
            $length
        );

        return self::create($message, $code, $previous);
    }
}
