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
    if (false === \class_exists('ArgumentCountError')) {
        /**
         * ArgumentCountError is thrown when too few arguments are passed to a user
         * defined routine.
         *
         * @since 7.1
         * @see https://php.net/migration71.incompatible#migration71.incompatible.too-few-arguments-exception
         */
        class ArgumentCountError extends TypeError
        {
        }
    }
}
