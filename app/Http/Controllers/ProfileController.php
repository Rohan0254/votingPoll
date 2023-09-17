<?php


namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Redirect;


class ProfileController extends Controller
{    
    public function index()
    {
        return view('profile');
    }

    public function update(User $user, Request $request)
    {   
        $user->update([
            'name' => $request->name,
            'updated_at' => now()
        ]);

       return  Redirect::route('profile')->with('success', 'Profile updated successfully!');

    }
}
