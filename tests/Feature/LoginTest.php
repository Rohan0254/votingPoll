<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class LoginTest extends TestCase
{
    public function testUserCanLogin()
    {
        $user = User::factory()->create();

        $userData = [
            'email' => $user->email,
            'password' => 'password',
        ];

        $response = $this->post('/login', $userData);
        \LogActivity::addToLog('Login.');

        $this->assertAuthenticated();
    }
}
