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
    if (false === \class_exists('CompileError')) {
        /**
         * Class CompileError.
         *
         * @see https://secure.php.net/manual/en/class.compileerror.php
         * @since 7.3
         */
        class CompileError extends Error
        {
        }
    }
}
