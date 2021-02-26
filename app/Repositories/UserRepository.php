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
        $tasksPaginate = DB::table('users')->where('is_admin','=',0)->get();
        return  $tasksPaginate;
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
            if(Carbon::parse($task->start)->timestamp > Carbon::now()->timestamp && Carbon::parse($task->start)->timestamp < Carbon::now()->addMinutes(60)->timestamp)
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
        return redirect()->route('userTasks');
    }


}
