<?php

namespace App\Repositories;
use Illuminate\Http\Request;

interface UserRepositoryInterface
{
    public function getTasks();
    public function storeTaskResult(Request $request);
}
