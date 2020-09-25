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
    if (false === \class_exists('TypeError')) {
        /**
         * There are three scenarios where a TypeError may be thrown.
         * The first is where the argument type being passed to a function does not match its corresponding declared
         * parameter type. The second is where a value being returned from a function does not match the declared
         * function return type. The third is where an invalid number of arguments are passed to a built-in PHP function
         * (strict mode only).
         *
         * @link http://php.net/manual/en/class.typeerror.php
         * @since 7.0
         */
        class TypeError extends Error
        {
        }
    }
}
