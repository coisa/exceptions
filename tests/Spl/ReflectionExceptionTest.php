<?php

namespace CoiSA\Exception\Spl;

use CoiSA\Exception\AbstractExceptionTestCase;

/**
 * Class ReflectionExceptionTest
 *
 * @package CoiSA\Exception\Spl
 */
final class ReflectionExceptionTest extends AbstractExceptionTestCase
{
    /**
     * @return string
     */
    public function getExceptionClass()
    {
        return __NAMESPACE__ . '\\ReflectionException';
    }
}
