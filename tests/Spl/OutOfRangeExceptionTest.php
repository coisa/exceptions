<?php

namespace CoiSA\Exception\Spl;

use CoiSA\Exception\AbstractExceptionTestCase;

/**
 * Class OutOfRangeExceptionTest
 *
 * @package CoiSA\Exception\Spl
 */
final class OutOfRangeExceptionTest extends AbstractExceptionTestCase
{
    /**
     * @return string
     */
    public function getExceptionClass()
    {
        return __NAMESPACE__ . '\\OutOfRangeException';
    }
}
