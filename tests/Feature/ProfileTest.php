<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class ProfileTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testProfileUpdate()
    {
        $user = User::factory()->create();
        $userData = [
            'email' => $user->email,
            'password' => 'password',
        ];
        $response = $this->post('/login', $userData);
        $this->assertAuthenticated();

        $user->update([
            'name' => "TEST NAME",
            'updated_at' => now()
        ]);

        $response->assertStatus(302);
        \LogActivity::addToLog('Profile Updated.');

    }
}
