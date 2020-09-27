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

namespace CoiSA\Exception\Spl;

use CoiSA\Exception\ExceptionInterface;

/**
 * Class BadMethodCallException
 *
 * @package CoiSA\Exception\Spl
 */
class BadMethodCallException extends \BadMethodCallException implements ExceptionInterface
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
