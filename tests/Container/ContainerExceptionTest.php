<?php

/**
 * This file is part of coisa/exceptions.
 *
 * This source file is subject to the license that is bundled
 * with this source code in the file LICENSE.
 *
 * @link      https://github.com/coisa/exceptions
 * @copyright Copyright (c) 2020 Felipe Sayão Lobato Abreu <github@felipeabreu.com.br>
 * @license   https://opensource.org/licenses/MIT MIT License
 */

namespace CoiSA\Exception\Container;

use CoiSA\Exception\AbstractExceptionTestCase;

/**
 * Class ContainerExceptionTest
 *
 * @package CoiSA\Exception\Container
 */
final class ContainerExceptionTest extends AbstractExceptionTestCase
{
    /**
     * @return string
     */
    public function getExceptionClass()
    {
        return __NAMESPACE__ . '\\ContainerException';
    }

    public function testForExceptionResolvingIdentifierWillReturnContainerException()
    {
        $id       = \uniqid('id', true);
        $code     = \mt_rand(1, 1000);
        $previous = new \Exception(
            \uniqid('message', true),
            \mt_rand(1, 1000)
        );

        /** @var ContainerException $containerException */
        $containerException = ContainerException::forExceptionResolvingIdentifier($previous, $id, $code);

        self::assertInstanceOf(__NAMESPACE__ . '\\ContainerException', $containerException);
        self::assertEquals(
            \sprintf(ContainerException::MESSAGE_EXCEPTION_RESOLVING_IDENTIFIER, $previous->getMessage(), $id),
            $containerException->getMessage()
        );
        self::assertEquals($code, $containerException->getCode());
        self::assertSame($previous, $containerException->getPrevious());
    }
}
