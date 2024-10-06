<?php

namespace App\Services;

use App\Models\Task;

class TaskDistributionService
{
    protected $developers = [
        'DEV1' => 1,
        'DEV2' => 2,
        'DEV3' => 3,
        'DEV4' => 4,
        'DEV5' => 5,
    ];

    public function distributeTasks()
    {
        $tasks = Task::orderBy('difficulty', 'desc')->get();
        $developerWorkload = array_fill_keys(array_keys($this->developers), 0);
        $maxHoursPerWeek = 45;

        foreach ($tasks as $task) {
            $assignedDeveloper = $this->getBestDeveloper($developerWorkload, $task->difficulty);
            $workload = $task->duration / $this->developers[$assignedDeveloper];
            $developerWorkload[$assignedDeveloper] += $workload;
        }

        $weeks = max($developerWorkload) / $maxHoursPerWeek;
        return ceil($weeks);
    }

    private function getBestDeveloper($developerWorkload, $taskDifficulty)
    {
        $bestDeveloper = null;
        $bestLoad = null;

        foreach ($this->developers as $developer => $capacity) {
            $effectiveLoad = $developerWorkload[$developer] + ($taskDifficulty / $capacity);

            if (is_null($bestLoad) || $effectiveLoad < $bestLoad) {
                $bestDeveloper = $developer;
                $bestLoad = $effectiveLoad;
            }
        }

        return $bestDeveloper;
    }
}
