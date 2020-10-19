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
namespace {
    if (false === \class_exists('ArithmeticError')) {
        /**
         * ArithmeticError is thrown when an error occurs while performing mathematical operations.
         * In PHP 7.0, these errors include attempting to perform a bitshift by a negative amount,
         * and any call to {@see intdiv()} that would result in a value outside the possible bounds of an integer.
         *
         * @see http://php.net/manual/en/class.arithmeticerror.php
         * @since 7.0
         */
        class ArithmeticError extends Error
        {
        }
    }
}
