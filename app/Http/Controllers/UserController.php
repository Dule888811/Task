<?php

namespace App\Http\Controllers;

use App\Repositories\UserRepositoryInterface;
use App\User;
use \Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private  $_userRepository;
    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->_userRepository = $userRepository;
    }

    public function index()
    {
        $tasks = $this->_userRepository->getTasks();
        return view('user.index')->with(['tasks' => $tasks]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function storeTaskResult(Request $request)
    {
        $this->validate($request, [
            'img' => 'image',
            'taskResult' => 'required'
        ]);
         $this->_userRepository->storeTaskResult($request);
        return redirect()->route('userTasks');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */

}
