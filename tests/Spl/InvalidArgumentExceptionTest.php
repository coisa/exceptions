<?php

namespace CoiSA\Exception\Spl;

use CoiSA\Exception\AbstractExceptionTestCase;

/**
 * Class InvalidArgumentExceptionTest
 *
 * @package CoiSA\Exception\Spl
 */
final class InvalidArgumentExceptionTest extends AbstractExceptionTestCase
{
    /**
     * @return string
     */
    public function getExceptionClass()
    {
        return __NAMESPACE__ . '\\InvalidArgumentException';
    }
}
