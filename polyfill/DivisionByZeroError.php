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

namespace {
    if (false === \class_exists('DivisionByZeroError')) {
        /**
         * DivisionByZeroError is thrown when an attempt is made to divide a number by zero.
         *
         * @link http://php.net/manual/en/class.divisionbyzeroerror.php
         * @since 7.0
         */
        class DivisionByZeroError extends ArithmeticError
        {
        }
    }
}
