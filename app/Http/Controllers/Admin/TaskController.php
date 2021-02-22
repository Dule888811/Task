<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Repositories\Admin\TaskRepositoryInterface;
use App\Repositories\UserRepository;
use App\Task;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Relations;
use phpDocumentor\Reflection\Types\Collection;
use Illuminate\Support\Facades\Validator;

class TaskController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    private  $_taskRepository;
    public function __construct(TaskRepositoryInterface $taskRepository)
    {
        $this->_taskRepository = $taskRepository;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $tasks = $this->_taskRepository->allPaginate();
        if(!empty($tasks)){
            return view('admin.index')->with(['tasks' => $tasks]);
        }
        else
            {
            return view('admin.index');
        }

    }

    public function create()
    {
        return view('admin.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'start' => 'required|date|after_or_equal:\'.$todayDate'

        ]);

            $this->_taskRepository->store($request);

            return redirect()->back();
        }

    public function getPercentSuccess($taskId)
    {
        $success = $this->_taskRepository->getPercentSuccess($taskId);
         return view('admin.success')->with(['success' => $success]);

    }

    public function getBastWorkers()
    {
        $allTask = $this->_taskRepository->getBastWorkers();
        return view('admin.weekResult')->with(['allTask' => $allTask]);

    }



        //  dd(count(array($attayImage)));



}
