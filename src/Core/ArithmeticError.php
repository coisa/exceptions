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

namespace CoiSA\Exception\Core;

use CoiSA\Exception\ExceptionInterface;

/**
 * Class ArithmeticError
 *
 * @package CoiSA\Exception\Core
 */
class ArithmeticError extends \ArithmeticError implements ExceptionInterface
{
    /**
     * {@inheritDoc}
     */
    public static function create($message, $code = 0, \Throwable $previous = null)
    {
        $exceptionClass = \get_called_class();

        return new $exceptionClass($message, $code, $previous);
    }
}
