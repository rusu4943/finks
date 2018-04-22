<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class LoginTest extends TestCase
{
    public function testUploadImage(): void
    {
        $this->assertInstanceOf(
            Email::class,
            Email::fromString('user@example.com')
        );
    }

    public function testUploadNonImage(): void
    {
        $this->expectException(InvalidArgumentException::class);

        Email::fromString('invalid');
    }
}