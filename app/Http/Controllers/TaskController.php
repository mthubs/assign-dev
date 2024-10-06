<?php

namespace App\Http\Controllers;

use App\Services\TaskDistributionService;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function app(TaskDistributionService $service)
    {
        $weeks = $service->distributeTasks();
        return view('welcome', compact('weeks'));
    }
}
