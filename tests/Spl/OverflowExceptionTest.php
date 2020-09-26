<?php

namespace CoiSA\Exception\Spl;

use CoiSA\Exception\AbstractExceptionTestCase;

/**
 * Class OverflowExceptionTest
 *
 * @package CoiSA\Exception\Spl
 */
final class OverflowExceptionTest extends AbstractExceptionTestCase
{
    /**
     * @return string
     */
    public function getExceptionClass()
    {
        return __NAMESPACE__ . '\\OverflowException';
    }
}
