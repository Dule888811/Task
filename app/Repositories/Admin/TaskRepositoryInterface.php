<?php

namespace App\Repositories\Admin;

use Illuminate\Http\Request;

interface TaskRepositoryInterface
{
    public function store(Request $request);
}
