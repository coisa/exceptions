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
 * Class ContainerExceptionTest.
 *
 * @package CoiSA\Exception\Container
 *
 * @internal
 * @coversDefaultClass \CoiSA\Exception\Container\ContainerException
 */
final class ContainerExceptionTest extends AbstractExceptionTestCase
{
    public function getExceptionClass(): string
    {
        return ContainerException::class;
    }

    /**
     * @covers ::forExceptionResolvingIdentifier
     */
    public function testForExceptionResolvingIdentifierWillReturnContainerException(): void
    {
        $id       = uniqid('id', true);
        $code     = random_int(1, 1000);
        $previous = new \Exception(
            uniqid('message', true),
            random_int(1, 1000)
        );

        /** @var ContainerException $containerException */
        $containerException = ContainerException::forExceptionResolvingIdentifier($previous, $id, $code);

        parent::assertInstanceOf(ContainerException::class, $containerException);
        parent::assertSame(
            sprintf(ContainerException::MESSAGE_EXCEPTION_RESOLVING_IDENTIFIER, $previous->getMessage(), $id),
            $containerException->getMessage()
        );
        parent::assertSame($code, $containerException->getCode());
        parent::assertSame($previous, $containerException->getPrevious());
    }
}
