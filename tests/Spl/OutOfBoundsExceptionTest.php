<?php

namespace CoiSA\Exception\Spl;

use CoiSA\Exception\AbstractExceptionTestCase;

/**
 * Class OutOfBoundsExceptionTest
 *
 * @package CoiSA\Exception\Spl
 */
final class OutOfBoundsExceptionTest extends AbstractExceptionTestCase
{
    /**
     * @return string
     */
    public function getExceptionClass()
    {
        return __NAMESPACE__ . '\\OutOfBoundsException';
    }
}
