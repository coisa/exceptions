<?php

namespace CoiSA\Exception\Spl;

use CoiSA\Exception\AbstractExceptionTestCase;

/**
 * Class UnexpectedValueExceptionTest
 *
 * @package CoiSA\Exception\Spl
 */
final class UnexpectedValueExceptionTest extends AbstractExceptionTestCase
{
    /**
     * @return string
     */
    public function getExceptionClass()
    {
        return __NAMESPACE__ . '\\UnexpectedValueException';
    }
}
