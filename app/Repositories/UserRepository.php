<?php


namespace App\Repositories;

use App\User;
use Illuminate\Http\Request;
use App\Task;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserRepository implements UserRepositoryInterface
{
    public function getAllUser(){
        return  DB::table('users')->where('is_admin','=',0)->get();

    }

    public function getUserById($id)
    {
        return User::find($id);
    }

    public function getTaskById($id)
    {
        return Task::find($id);
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
        $task= $this->getTaskById($request->taskId);
        $user = $this->getUserById($request->userId);

        if($request->img != null && $request->yesFast == "yes"){
           $image = file_get_contents($_FILES['img']['tmp_name']);
           $image = base64_encode($image);
       }else{
           $image = null;
       }

        $task->users()->attach($user,['image' => $image]);
    }

    public function storeUnfinishedTask($taskId)
    {
        $users = $this->getAllUser();
        foreach($users as $user)
        {
            $task= $this->getTaskById($taskId);
            $task->users()->attach($user->id,['image' => null]);
        }


    }
}
