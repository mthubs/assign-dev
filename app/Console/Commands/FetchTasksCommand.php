<?php

namespace App\Console\Commands;

use App\Services\Providers\ProviderOneAdapter;
use App\Services\Providers\ProviderTwoAdapter;
use App\Services\TaskService;
use Illuminate\Console\Command;

class FetchTasksCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tasks:fetch {provider}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch tasks from specified provider';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $provider = $this->argument('provider');

        if ($provider == 'provider1') {
            $taskService = new TaskService(new ProviderOneAdapter());
        } elseif ($provider == 'provider2') {
            $taskService = new TaskService(new ProviderTwoAdapter());
        } else {
            $this->error('Unknown provider.');
            return;
        }

        $taskService->fetchAndStoreTasks();

        $this->info('Tasks successfully fetched and saved from ' . $provider);
    }
}
