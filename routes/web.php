<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [App\Http\Controllers\VotingPollController::class, 'allPoll'])->name('allPoll');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/create-poll', [App\Http\Controllers\PollController::class, 'index'])->name('createpoll.index');
Route::post('/create-poll', [App\Http\Controllers\PollController::class, 'save'])->name('save');

Route::get('/view-poll', [App\Http\Controllers\PollController::class, 'view'])->name('view.pole');
Route::get('/participate-poll', [App\Http\Controllers\PollController::class, 'view'])->name('view');
Route::post('/save-poll',  [App\Http\Controllers\VotingPollController::class, 'savePoll'])->name('save.option');
Route::get('/history',  [App\Http\Controllers\VotingPollController::class, 'history'])->name('history');

Route::get('add-to-log', [App\Http\Controllers\HomeController::class, 'AddToLog'])->name('AddToLog');
Route::get('logActivity', [App\Http\Controllers\HomeController::class, 'logActivity'])->name('logActivity');


Route::get('profile',[App\Http\Controllers\ProfileController::class,'index'])->name('profile');
Route::post('profile/{user}',[App\Http\Controllers\ProfileController::class,'update'])->name('profile.update');
