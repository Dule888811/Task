<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Repositories\Admin\TaskRepositoryInterface;
use App\Task;
use Carbon\Carbon;
use Illuminate\Http\Request;
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
        $tasks = $this->_taskRepository->all();

        return view('admin.index')->with(['tasks' => $tasks]);
    }

    public function create()
    {
        return view('admin.create');
    }

    public function store(Request $request)
    {

            $this->_taskRepository->store($request);

            return redirect()->back();
        }



}
