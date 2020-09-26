<?php

namespace CoiSA\Exception\Core;

use CoiSA\Exception\AbstractExceptionTestCase;

/**
 * Class DivisionByZeroErrorTest
 *
 * @package CoiSA\Exception\Core
 */
final class DivisionByZeroErrorTest extends AbstractExceptionTestCase
{
    /**
     * @return string
     */
    public function getExceptionClass()
    {
        return __NAMESPACE__ . '\\DivisionByZeroError';
    }
}
