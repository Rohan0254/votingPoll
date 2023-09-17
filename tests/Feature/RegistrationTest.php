<?php 
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use Faker\Factory as FakerFactory;

class RegistrationTest extends TestCase
{
    
    public function testUserCanRegister()
    {
        $faker = FakerFactory::create();
        $randomEmail = $faker->unique()->safeEmail;

        $userData = [
            'name' => 'John Doe',
            'email' => $randomEmail,
            'password' => 'password',
            'password_confirmation' => 'password',
        ];

        $response = $this->post('/register', $userData);

        $response->assertStatus(302); // Check for a redirect upon successful registration
        $this->assertAuthenticated(); // Check if the user is authenticated
        \LogActivity::addToLog('New Registration.');

    }
}
?>
