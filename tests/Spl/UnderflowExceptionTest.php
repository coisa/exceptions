<?php

namespace CoiSA\Exception\Spl;

use CoiSA\Exception\AbstractExceptionTestCase;

/**
 * Class UnderflowExceptionTest
 *
 * @package CoiSA\Exception\Spl
 */
final class UnderflowExceptionTest extends AbstractExceptionTestCase
{
    /**
     * @return string
     */
    public function getExceptionClass()
    {
        return __NAMESPACE__ . '\\UnderflowException';
    }
}
