<?php

namespace CoiSA\Exception\Core;

use CoiSA\Exception\AbstractExceptionTestCase;

/**
 * Class AssertionErrorTest
 *
 * @package CoiSA\Exception\Core
 */
final class AssertionErrorTest extends AbstractExceptionTestCase
{
    /**
     * @return string
     */
    public function getExceptionClass()
    {
        return __NAMESPACE__ . '\\AssertionError';
    }
}
