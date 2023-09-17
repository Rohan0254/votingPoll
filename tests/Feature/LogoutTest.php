<?php
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;

class LogoutTest extends TestCase
{

    public function testUserCanLogout()
    {
        $user = User::factory()->create();
        $this->actingAs($user); // Authenticate the user

        $response = $this->post('/logout');

        $response->assertStatus(302); // Check for a redirect upon logout
        $this->assertGuest(); // Check if the user is no longer authenticated
        \LogActivity::addToLog('Logout.');

    }
}

?>