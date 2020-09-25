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

require_once __DIR__ . '/../vendor/autoload.php';

# docker run --rm --volume $PWD:/app php:5.3 php /app/examples/index.php
\var_dump(
    \CoiSA\Exception\Core\ArgumentCountError::forExpectedAtLeaseOneArgument(),
    \get_included_files()
);
