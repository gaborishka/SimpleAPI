<?php

namespace App\Listeners;

use App\Events\SubmissionSaved;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Log;

class LogSubmissionSaved implements ShouldQueue
{
    public function handle(SubmissionSaved $event): void
    {
        Log::info('Submission saved: ', [
            'name' => $event->submissionDTO->name,
            'email' => $event->submissionDTO->email
        ]);
    }
}
