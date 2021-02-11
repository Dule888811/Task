<?php


namespace App\Repositories;

use App\User;
use Illuminate\Http\Request;
use App\Task;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
class UserRepository implements UserRepositoryInterface
{
    public function getUserById($id)
    {
        return User::find($id);
    }

    public function getTasks()
    {
      $tasksArray = [];
        $tasks = Task::all();
        foreach($tasks as $task)
        {
            if($task->start >= Carbon::now() && $task->start <= Carbon::now()->addMinutes(60))
            {
                $tasksArray[] = $task;
            }
        }
        return $tasksArray;

    }

    public function storeTaskResult(Request $request)
    {
        $task= Task::find($request->taskId);
        $user = $this->getUserById($request->userId);
       /* if(/*$request->file('img') == null || $request->taskResult == 'no' )
        {

        }else {


        } */
       if($request->img != null && $request->taskResult == "yes"){
           $image = file_get_contents($_FILES['img']['tmp_name']);
           $image = base64_encode($image);
       }else{
           $image = null;
       }

        $task->users()->attach($user,['image' => $image]);
    }
}
