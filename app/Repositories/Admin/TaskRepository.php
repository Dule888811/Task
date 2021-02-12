<?php


namespace App\Repositories\Admin;

use App\Mail\TaskMail;
use Illuminate\Http\Request;
use App\Task;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use App\User;
class TaskRepository implements TaskRepositoryInterface
{
    public function  store(Request $request)
        {
                $task = new Task();
                $task->description = $request->task;
                $date = Carbon::parse($request->startTask);
                $date->format('Y-m-d H:i:s');
                $task->start = $date;
                $task->save();
                foreach (User::all() as $user){
                    if(!$user->is_admin){
                        Mail::to($user->email)->later($task->start,new TaskMail($task->description));
                    }
                }


        }

    public function all()
    {
        if(!empty(Task::all()->getQueueableIds())) {
            return Task::all();
        }
    }
}
