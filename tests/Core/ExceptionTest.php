<?php

namespace CoiSA\Exception\Core;

use CoiSA\Exception\AbstractExceptionTestCase;

/**
 * Class ExceptionTest
 *
 * @package CoiSA\Exception\Core
 */
final class ExceptionTest extends AbstractExceptionTestCase
{
    /**
     * @return string
     */
    public function getExceptionClass()
    {
        return __NAMESPACE__ . '\\Exception';
    }
}
