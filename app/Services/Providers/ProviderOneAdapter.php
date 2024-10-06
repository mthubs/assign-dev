<?php

namespace App\Services\Providers;

use App\Services\Contracts\TaskProviderInterface;
use Illuminate\Support\Facades\Http;

class ProviderOneAdapter implements TaskProviderInterface
{
    public function getTasks(): array
    {
        $response = Http::get('https://raw.githubusercontent.com/WEG-Technology/mock/refs/heads/main/mock-one');
        $tasks = $response->json();

        return array_map(function ($task) {
            return [
                'duration' => $task['estimated_duration'],
                'difficulty' => $task['value'],
            ];
        }, $tasks);
    }
}
