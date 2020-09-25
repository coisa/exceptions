<?php

require_once __DIR__ . '/../vendor/autoload.php';

# docker run --rm --volume $PWD:/app php:5.3 php /app/examples/index.php
var_dump(
    \CoiSA\Exception\BadFunctionCallException::forExpectedAtLeaseOneArgument(),
    get_included_files()
);
