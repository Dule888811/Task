<?php


namespace App\Repositories\Admin;

use App\Mail\TaskMail;
use Illuminate\Http\Request;
use App\Task;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\User;
use PhpParser\ErrorHandler\Collecting;

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

    public function goodTasks($taskId)
    {
        $task = Task::find($taskId);
        if ($task->with('users')->from('task_user')
                ->get()->toArray() > 0) {
            return count($task->with('users')->from('task_user')
                ->where([['image', '!=', null], ['task_id', $taskId]])
                ->get()->toArray());
        } else {
            return 0;
        }
    }

    public function ResultOfFinishedTasks($taskId)
    {
        $task = Task::find($taskId);
        if(count($task->with('users')->from('task_user')
            ->where('task_id' ,'=', $taskId)
            ->get()->toArray()) > 0)
        {
          return  count($task->with('users')->from('task_user')
                ->where('task_id' ,'=', $taskId)
                ->get()->toArray());
        }
        else
        {
            return 0;
        }

    }

    public function allPaginate()
    {
       return $this->all()->Paginate(10);

        }

        public function getPercentSuccess($taskId)
        {

            $goodTasks = $this->goodTasks($taskId);

                $allTasks = $this->ResultOfFinishedTasks($taskId);

                if($allTasks != 0 && $goodTasks != 0)
                {
                    return number_format($goodTasks/$allTasks * 100);
                }

            else {
                return 0;
            }

        }

        public function getBastWorkers()
        {
            $tasksAll = [];
            foreach (User::all() as $user) {
                if(!$user->is_admin) {
                    $tasksAll[] = $user->with('tasks')->from('task_user')
                        ->select('user_id','image','task_id')
                        ->where('image', '!=', null)
                        ->get();
                }
            }

            $taskCol = collect($tasksAll);
         //   dd(Task::find($taskCol->first()[0]->task_id)['start']);
          //  $taskTime = Task::find($taskCol->first()[0]->task_id);
            $col = new \Illuminate\Database\Eloquent\Collection();
            foreach($taskCol->first()->groupBy('user_id') as $collection)
            {
                if(Task::find($taskCol->first()[0]->task_id)['start'] < Carbon::now()->endOfWeek())
                {
                    $col->push([
                        'name' => User::find($collection[0]['user_id'])->name,
                        'tasks' => $collection->count()
                    ]) ;
                }

            }
            return $col->sortByDesc('tasks')->take(10);
        }
}
