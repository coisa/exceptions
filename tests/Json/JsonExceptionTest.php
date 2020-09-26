<?php

namespace CoiSA\Exception\Json;

use CoiSA\Exception\AbstractExceptionTestCase;

/**
 * Class JsonExceptionTest
 *
 * @package CoiSA\Exception\Json
 */
final class JsonExceptionTest extends AbstractExceptionTestCase
{
    /**
     * @return string
     */
    public function getExceptionClass()
    {
        return __NAMESPACE__ . '\\JsonException';
    }
}
