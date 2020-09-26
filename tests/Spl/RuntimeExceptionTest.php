<?php

namespace CoiSA\Exception\Spl;

use CoiSA\Exception\AbstractExceptionTestCase;

/**
 * Class RuntimeExceptionTest
 *
 * @package CoiSA\Exception\Spl
 */
final class RuntimeExceptionTest extends AbstractExceptionTestCase
{
    /**
     * @return string
     */
    public function getExceptionClass()
    {
        return __NAMESPACE__ . '\\RuntimeException';
    }
}
