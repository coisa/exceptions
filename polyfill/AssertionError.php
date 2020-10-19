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
    if (false === \class_exists('AssertionError')) {
        /**
         * AssertionError is thrown when an assertion made via {@see assert()} fails.
         *
         * @see http://php.net/manual/en/class.assertionerror.php
         * @since 7.0
         */
        class AssertionError extends Error
        {
        }
    }
}
