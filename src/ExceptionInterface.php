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
 * Interface ExceptionInterface
 *
 * @package CoiSA\Exception
 */
interface ExceptionInterface extends Throwable
{
    /**
     * @param string          $message
     * @param int             $code
     * @param null|\Exception $previous
     *
     * @return Throwable
     */
    public static function create($message, $code = 0, \Exception $previous = null);
}
