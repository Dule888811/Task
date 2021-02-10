<?php


namespace App\Repositories\Admin;

use Illuminate\Http\Request;
use App\Task;
use Carbon\Carbon;

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
        }

    public function all()
    {
        return Task::all();
    }
}
