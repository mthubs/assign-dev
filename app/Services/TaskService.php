<?php

namespace App\Services;

use App\Models\Task;
use App\Services\Contracts\TaskProviderInterface;

class TaskService
{
    protected $provider;

    public function __construct(TaskProviderInterface $provider)
    {
        $this->provider = $provider;
    }

    public function fetchAndStoreTasks()
    {
        $tasks = $this->provider->getTasks();

        foreach ($tasks as $task) {
            Task::create([
                'duration' => $task['duration'],
                'difficulty' => $task['difficulty'],
            ]);
        }
    }
}
