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
 * Class RangeException.
 *
 * @package CoiSA\Exception\Spl
 */
class RangeException extends \RangeException implements ExceptionInterface
{
    /**
     * {@inheritdoc}
     */
    public static function create(string $message, int $code = 0, \Throwable $previous = null): self
    {
        return new self($message, $code, $previous);
    }
}
