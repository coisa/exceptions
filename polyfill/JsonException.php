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
    if (false === \class_exists('JsonException')) {
        /**
         * Class JsonException
         *
         * <p>A new flag has been added, JSON_THROW_ON_ERROR, which can be used with
         * json_decode() or json_encode() and causes these functions to throw a
         * JsonException upon an error, instead of setting the global error state that
         * is retrieved with json_last_error(). JSON_PARTIAL_OUTPUT_ON_ERROR takes
         * precedence over <b>JSON_THROW_ON_ERROR</b>.
         * </p>
         *
         * @since 7.3
         * @link https://wiki.php.net/rfc/json_throw_on_error
         */
        class JsonException extends Exception implements Throwable
        {
        }
    }
}
