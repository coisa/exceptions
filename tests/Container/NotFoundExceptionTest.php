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
 * Class NotFoundExceptionTest
 *
 * @package CoiSA\Exception\Container
 */
final class NotFoundExceptionTest extends AbstractExceptionTestCase
{
    /**
     * @return string
     */
    public function getExceptionClass()
    {
        return __NAMESPACE__ . '\\NotFoundException';
    }

    public function testForNotFoundIdentifierFactoryWillReturnNotFoundException()
    {
        $id       = \uniqid('id', true);
        $code     = \mt_rand(1, 1000);
        $previous = new \Exception(
            \uniqid('message', true),
            \mt_rand(1, 1000)
        );

        /** @var NotFoundException $notFoundException */
        $notFoundException = NotFoundException::forNotFoundIdentifierFactory($id, $code, $previous);

        self::assertInstanceOf(__NAMESPACE__ . '\\NotFoundException', $notFoundException);
        self::assertEquals(
            \sprintf(NotFoundException::MESSAGE_NOT_FOUND_IDENTIFIER_FACTORY, $id),
            $notFoundException->getMessage()
        );
        self::assertEquals($code, $notFoundException->getCode());
        self::assertSame($previous, $notFoundException->getPrevious());
    }
}
