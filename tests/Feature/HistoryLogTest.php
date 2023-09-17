<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\LogActivity;


class HistoryLogTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testHistoryLog()
    {
        $user = User::factory()->create();
        $userData = [
            'email' => $user->email,
            'password' => 'password',
        ];
        $response = $this->post('/login', $userData);
        $this->assertAuthenticated();

        $logs = LogActivity::where("user_id", '=', $user->id)->orderBy('created_at','desc')->get();

        $response = $this->get('logActivity', compact('logs'));
        $response->assertStatus(200);
        \LogActivity::addToLog('History Page Visited.');

    }
}
