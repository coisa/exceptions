<?php

declare(strict_types=1);

/**
 * This file is part of coisa/exceptions.
 *
 * This source file is subject to the license that is bundled
 * with this source code in the file LICENSE.
 *
 * @link      https://github.com/coisa/exceptions
 * @copyright Copyright (c) 2020-2022 Felipe Sayão Lobato Abreu <github@felipeabreu.com.br>
 * @license   https://opensource.org/licenses/MIT MIT License
 */

namespace CoiSA\Exception\Container;

use CoiSA\Exception\AbstractExceptionTestCase;

/**
 * Class NotFoundExceptionTest.
 *
 * @package CoiSA\Exception\Container
 *
 * @internal
 * @coversDefaultClass \CoiSA\Exception\Container\NotFoundException
 */
final class NotFoundExceptionTest extends AbstractExceptionTestCase
{
    public function getExceptionClass(): string
    {
        return NotFoundException::class;
    }

    /**
     * @covers ::forNotFoundIdentifierFactory
     */
    public function testForNotFoundIdentifierFactoryWillReturnNotFoundException(): void
    {
        $id       = uniqid('id', true);
        $code     = random_int(1, 1000);
        $previous = new \Exception(
            uniqid('message', true),
            random_int(1, 1000)
        );

        /** @var NotFoundException $notFoundException */
        $notFoundException = NotFoundException::forNotFoundIdentifierFactory($id, $code, $previous);

        parent::assertInstanceOf(NotFoundException::class, $notFoundException);
        parent::assertSame(
            sprintf(NotFoundException::MESSAGE_NOT_FOUND_IDENTIFIER_FACTORY, $id),
            $notFoundException->getMessage()
        );
        parent::assertSame($code, $notFoundException->getCode());
        parent::assertSame($previous, $notFoundException->getPrevious());
    }
}
