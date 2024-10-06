<?php

namespace App\Services\Contracts;

interface TaskProviderInterface
{
    public function getTasks(): array;
}
