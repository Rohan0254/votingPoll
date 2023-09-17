<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Poll;
use App\Models\PollAnswer;
use App\Models\PollQuestion;
use Illuminate\Support\Facades\Validator;
use Redirect;


class VotingPollController extends Controller
{



    public function allPoll()
    {
      $poll = Poll::paginate(8);

       if(auth()->check()){
          \LogActivity::addToLog('Viewed all polls');
        }
  
      return view('VotingPoll', compact('poll'));        
    }
    

    public function savePoll(Request $request)
    {

        if (!auth()->check()) {
                    return response()->json(['message' => "Login"]);
        }

        $userId = auth()->user()->id;


        PollAnswer::create(['user_id'=>$userId, 'question_id'=>$request->pollId, 'ans_id'=>$request->QId ]);
        $Polls = PollQuestion::where('poll_id', '=', $request->pollId)->get();

        $polls;
        $totalVotes = 0;
        foreach ($Polls as $key => $value) {
            $pa = PollAnswer::where("ans_id", '=', $value->id)->count();
            $polls[$value->id] = $pa;
            $totalVotes += $pa;
        }

        foreach ($polls as $k => $poll) {
            $percentage = ($polls[$k] / $totalVotes) * 100;
            $polls[$k] = round($percentage, 2); // Round to two decimal places
        }

        \LogActivity::addToLog('Voted in a poll.');

        return response()->json(['data' => $polls]);
    }


    public function history()
    {
      $userId = auth()->user()->id;
      $polla = PollAnswer::where("user_id", '=', $userId)->orderBy('created_at','desc')->get();

      $poll = array();

      $i=0;

      foreach ($polla as $key => $value) {
       $i++;
          # code...
        // echo "<pre>";
        $q = Poll::where("id", '=', $value->question_id)->first();
        $a = PollQuestion::where("id", '=', $value->ans_id)->first();
        $ao = PollQuestion::where("poll_id", '=', $value->question_id)->get();

        $questions = "";
        foreach ($ao as  $que) {
            # code...
            if($questions!="")
                $questions .=",";
            $questions .=$que->question;
        }
  
         $poll[]=[
                "id"=>$i,
                'title' => $q->title,
                'ans' => $a->question,
                'vote_at' => $a->created_at,
                'options' => $questions
         ];


      }

        \LogActivity::addToLog('My voting history page visited.');

      return view('history', compact('poll'));        
    }

}
