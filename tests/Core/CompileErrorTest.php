<?php

namespace CoiSA\Exception\Core;

use CoiSA\Exception\AbstractExceptionTestCase;

/**
 * Class CompileErrorTest
 *
 * @package CoiSA\Exception\Core
 */
final class CompileErrorTest extends AbstractExceptionTestCase
{
    /**
     * @return string
     */
    public function getExceptionClass()
    {
        return __NAMESPACE__ . '\\CompileError';
    }
}
