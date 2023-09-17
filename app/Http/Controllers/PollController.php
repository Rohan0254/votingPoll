<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Poll;
use App\Models\PollQuestion;
use Illuminate\Support\Facades\Validator;
use Redirect;


class PollController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
      \LogActivity::addToLog('Create new poll page visited.');

        return view('create-poll');
    }

    public function save(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'options' => 'required',
        ]);

        $poll_id = Poll::Create(["user_id"=> $request->user_id,"title"=>$request->title, "description"=>$request->description])->id;

        $q = explode(",", $request->options);
        foreach ($q as $que) {
            PollQuestion::Create(["poll_id"=>$poll_id, "question"=>$que]);
        }

        \LogActivity::addToLog('New poll created- ('.$request->title.')');

        return Redirect::back()->with('success', 'New poll created sucessfully!');

    }


    public function view()
    {
      $userId = auth()->user()->id;        
      $poll = Poll::with('PollQuestion')->where("user_id","=",$userId)->paginate(8);
      \LogActivity::addToLog('Viewed my polls');

      return view('view-poll', compact('poll'));        
    }





}
