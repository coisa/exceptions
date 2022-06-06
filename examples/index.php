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

use CoiSA\Exception\Core\ArgumentCountError;
use CoiSA\Exception\Spl\InvalidArgumentException;
use CoiSA\Exception\Spl\RuntimeException;

require_once __DIR__ . '/../vendor/autoload.php';

$exception     = ArgumentCountError::forExpectedExactAmount(1);
$wrapThrowable = InvalidArgumentException::createFromThrowable($exception);

RuntimeException::throw('Runtime exception!', 102, $wrapThrowable);
