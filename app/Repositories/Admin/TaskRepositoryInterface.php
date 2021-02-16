<?php

namespace App\Repositories\Admin;

use App\Task;
use Illuminate\Http\Request;

interface TaskRepositoryInterface
{
    public function store(Request $request);
    public function allPaginate();
    public function getPercentSuccess(Task $task);
}
