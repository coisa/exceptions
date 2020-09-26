<?php

namespace CoiSA\Exception\Core;

use CoiSA\Exception\AbstractExceptionTestCase;

/**
 * Class ArgumentCountErrorTest
 *
 * @package CoiSA\Exception\Core
 */
final class ArgumentCountErrorTest extends AbstractExceptionTestCase
{
    /**
     * @return string
     */
    public function getExceptionClass()
    {
        return __NAMESPACE__ . '\\ArgumentCountError';
    }
}
