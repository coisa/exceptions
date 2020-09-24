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
    if (false === \interface_exists('\Throwable')) {
        /**
         * Throwable is the base interface for any object that can be thrown via a throw statement in PHP 7,
         * including Error and Exception.
         *
         * @link  http://php.net/manual/en/class.throwable.php
         * @since 7.0
         */
        interface Throwable
        {
            /**
             * Gets a string representation of the thrown object
             *
             * @link  http://php.net/manual/en/throwable.tostring.php
             *
             * @return string <p>Returns the string representation of the thrown object.</p>
             *
             * @since 7.0
             */
            public function __toString();

            /**
             * Gets the message
             *
             * @link  http://php.net/manual/en/throwable.getmessage.php
             *
             * @return string
             *
             * @since 7.0
             */
            public function getMessage();

            /**
             * Gets the exception code
             *
             * @link  http://php.net/manual/en/throwable.getcode.php
             *
             * @return int <p>
             *             Returns the exception code as integer in
             *             {@see Exception} but possibly as other type in
             *             {@see Exception} descendants (for example as
             *             string in {@see PDOException}).
             *             </p>
             *
             * @since 7.0
             */
            public function getCode();

            /**
             * Gets the file in which the exception occurred
             *
             * @link  http://php.net/manual/en/throwable.getfile.php
             *
             * @return string returns the name of the file from which the object was thrown
             *
             * @since 7.0
             */
            public function getFile();

            /**
             * Gets the line on which the object was instantiated
             *
             * @link  http://php.net/manual/en/throwable.getline.php
             *
             * @return int returns the line number where the thrown object was instantiated
             *
             * @since 7.0
             */
            public function getLine();

            /**
             * Gets the stack trace
             *
             * @link  http://php.net/manual/en/throwable.gettrace.php
             *
             * @return array <p>
             *               Returns the stack trace as an array in the same format as
             *               {@see debug_backtrace()}.
             *               </p>
             *
             * @since 7.0
             */
            public function getTrace();

            /**
             * Gets the stack trace as a string
             *
             * @link  http://php.net/manual/en/throwable.gettraceasstring.php
             *
             * @return string returns the stack trace as a string
             *
             * @since 7.0
             */
            public function getTraceAsString();

            /**
             * Returns the previous Throwable
             *
             * @link  http://php.net/manual/en/throwable.getprevious.php
             *
             * @return Throwable returns the previous {@see Throwable} if available, or <b>NULL</b> otherwise
             *
             * @since 7.0
             */
            public function getPrevious();
        }
    }
}
