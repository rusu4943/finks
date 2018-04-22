<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class RegisterTest extends TestCase
{
    public function testRegisterWithNewUser(): void
    {
        $user_post = array('username' => 'test',
    				   'password' => 'test',
					   'email' => 'test@example.com',
    				   'passwordRepeat' => 'test'
    				);
        $this->assertEquals(
        	register($user_post),
        	0
        );

    }

    public function testAttemptRegisterExistingUser(): void
    {
    	$user_post = array('username' => 'test',
    					   'password' => 'test',
    					   'email' => 'test@example.com',
    					   'passwordRepeat' => 'test'
    				);
    	register($user_post);
        $this->assertEquals(
        	register($user_post),
        	1
        );
    }
}