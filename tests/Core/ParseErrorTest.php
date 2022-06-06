<?php

declare(strict_types=1);

/**
 * This file is part of coisa/exceptions.
 *
 * This source file is subject to the license that is bundled
 * with this source code in the file LICENSE.
 *
 * @link      https://github.com/coisa/exceptions
 * @copyright Copyright (c) 2020-2022 Felipe Sayão Lobato Abreu <github@felipeabreu.com.br>
 * @license   https://opensource.org/licenses/MIT MIT License
 */

namespace CoiSA\Exception\Core;

use CoiSA\Exception\AbstractExceptionTestCase;

/**
 * Class ParseErrorTest.
 *
 * @package CoiSA\Exception\Core
 *
 * @internal
 * @coversDefaultClass \CoiSA\Exception\Core\ParseError
 */
final class ParseErrorTest extends AbstractExceptionTestCase
{
    public function getExceptionClass(): string
    {
        return ParseError::class;
    }
}
