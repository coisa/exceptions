<?php

namespace CoiSA\Exception\Spl;

use CoiSA\Exception\AbstractExceptionTestCase;

/**
 * Class LengthExceptionTest
 *
 * @package CoiSA\Exception\Spl
 */
final class LengthExceptionTest extends AbstractExceptionTestCase
{
    /**
     * @return string
     */
    public function getExceptionClass()
    {
        return __NAMESPACE__ . '\\LengthException';
    }
}
