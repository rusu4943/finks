<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class LoginTest extends TestCase
{
    public function testLoginWithExistingUser(): void
    {
        $user_post = array('username' => 'test',
                       'password' => 'test',
                       'email' => 'test@example.com',
                       'passwordRepeat' => 'test'
                    );
        register(user_post);
        $this->assertEquals(
            login(user_post),
            0
        );
    }

    public function testAttemptLoginNonExistingUser(): void
    {
        $user_post = array('username' => (string)rand(1000000, 9999999)
                       #I know its hacky but its due in a few hours I'm sorry
                       'password' => 'test',
                       'email' => 'test@example.com',
                       'passwordRepeat' => 'test'
                    );
        $this->assertEquals(
            login(user_post),
            1
        );
    }
}