<?php

namespace CoiSA\Exception\Core;

use CoiSA\Exception\AbstractExceptionTestCase;

/**
 * Class ArithmeticErrorTest
 *
 * @package CoiSA\Exception\Core
 */
final class ArithmeticErrorTest extends AbstractExceptionTestCase
{
    /**
     * @return string
     */
    public function getExceptionClass()
    {
        return __NAMESPACE__ . '\\ArithmeticError';
    }
}
