<?php

namespace CoiSA\Exception\Spl;

use CoiSA\Exception\AbstractExceptionTestCase;

/**
 * Class BadFunctionCallExceptionTest
 *
 * @package CoiSA\Exception\Spl
 */
final class BadFunctionCallExceptionTest extends AbstractExceptionTestCase
{
    /**
     * @return string
     */
    public function getExceptionClass()
    {
        return __NAMESPACE__ . '\\BadFunctionCallException';
    }
}
