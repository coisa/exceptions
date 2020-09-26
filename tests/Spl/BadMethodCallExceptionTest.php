<?php

namespace CoiSA\Exception\Spl;

use CoiSA\Exception\AbstractExceptionTestCase;

/**
 * Class BadMethodCallExceptionTest
 *
 * @package CoiSA\Exception\Spl
 */
final class BadMethodCallExceptionTest extends AbstractExceptionTestCase
{
    /**
     * @return string
     */
    public function getExceptionClass()
    {
        return __NAMESPACE__ . '\\BadMethodCallException';
    }
}
