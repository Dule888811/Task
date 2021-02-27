<?php

use App\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
/*
 *                 @dd( \Illuminate\Support\Facades\Auth::user()->find($task->id))
                        @dd( \Illuminate\Support\Facades\Auth::id()->find($task->id)->id)
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/admin', function () {
    return view('admin');
});

Route::get('/emails', function () {
    Mail::to('emaile@yahoo.com')->send(new \App\Mail\TaskMail());
});
Auth::routes();
Route::post('/storeTask', 'UserController@storeTaskResult')->name('storeTaskResult')->middleware('auth');
Route::get('/home', function () {
    $user = User::find(Auth::id());
    if($user->is_admin){
        return redirect(route('admin.main'));
    }else{
        return redirect(route('userTasks'));
    }
});
Route::get('/tasks', 'UserController@index')->name('userTasks')->middleware('auth');
Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware('can:admin')->group(function(){
    Route::post('/store','TaskController@store')->name('store')->middleware('auth');
    Route::get('/main/{taskId}','TaskController@getPercentSuccess')->name('success');
    Route::get('/main','TaskController@index')->name('main');
    Route::get('/getBastWorkers.blade','TaskController@getBastWorkers')->name('getBastWorkers');
    Route::get('/create','TaskController@create')->name('create');
});

