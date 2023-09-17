<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PollAnswer;
use App\Models\LogActivity;


class HomeController extends Controller
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
      \LogActivity::addToLog('Dashboard visited.');

        return view('home');
    }



    public function logActivity()
    {
        // $logs = \LogActivity::logActivityLists();
        $userId = auth()->user()->id;
        $logs = LogActivity::where("user_id", '=', $userId)->orderBy('created_at','desc')->get();

        \LogActivity::addToLog('Log activity page visited.');
        return view('logActivity',compact('logs'));
    }

}
