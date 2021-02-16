<?php


namespace App\Repositories\Admin;

use App\Mail\TaskMail;
use Illuminate\Http\Request;
use App\Task;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
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
                    sleep(1);
                    if(!$user->is_admin){
                        Mail::to($user->email)->later($task->start,new TaskMail($task->description));
                    }
                }


        }

    public function all()
    {
        if(!empty(Task::all()->getQueueableIds())) {
            $tasks = DB::table('tasks');
            return  $tasks;
        }
    }

    public function allPaginate()
    {
       return $this->all()->Paginate(10);

        }

        public function getPercentSuccess(Task $task)
        {

            if(count($task->users()->withPivot('image')->getPivotColumns('image')) > 0)
            {
                return count($task->users()->withPivot('image')->getPivotColumns('image'))/ count($task->users()->withPivot('image')->getPivotColumns('id'));

            }
            else {
                return 0;
            }


        }

}
