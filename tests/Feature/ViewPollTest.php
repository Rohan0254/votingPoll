<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Poll;
use App\Models\PollQuestion;
use App\Models\User;


class ViewPollTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */


    public function testViewPoll()
    {
        $user = User::factory()->create();
        $userData = [
            'email' => $user->email,
            'password' => 'password',
        ];
        $response = $this->post('/login', $userData);
        $this->assertAuthenticated();

        $poll_id = Poll::Create(["user_id"=> $user->id, "title"=>"RAM stands for?", "description"=>"Computer fundamental question."])->id;

        $q = explode(",", "Random Access Memory,Random Asset Memory");
        foreach ($q as $que) {
            PollQuestion::Create(["poll_id"=>$poll_id, "question"=>$que]);
        }
      $poll = Poll::with('PollQuestion')->where("user_id","=",$user->id)->paginate(8);

        $response = $this->get('view-poll', compact('poll'));
        $response->assertStatus(200);
        \LogActivity::addToLog('View All Polls.');

    }

}
