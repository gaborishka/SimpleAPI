<?php

namespace App\Providers;

use App\Events\SubmissionSaved;
use App\Listeners\LogSubmissionSaved;
use Illuminate\Support\ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    protected array $listen = [
        SubmissionSaved::class => [
            LogSubmissionSaved::class,
        ],
    ];
}
