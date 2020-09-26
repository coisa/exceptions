<?php

namespace CoiSA\Exception\Core;

use CoiSA\Exception\AbstractExceptionTestCase;

/**
 * Class ParseErrorTest
 *
 * @package CoiSA\Exception\Core
 */
final class ParseErrorTest extends AbstractExceptionTestCase
{
    /**
     * @return string
     */
    public function getExceptionClass()
    {
        return __NAMESPACE__ . '\\ParseError';
    }
}
