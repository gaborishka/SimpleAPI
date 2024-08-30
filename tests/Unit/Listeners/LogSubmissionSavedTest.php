<?php

namespace Tests\Unit\Listeners;

use App\DTOs\SubmissionDTO;
use App\Events\SubmissionSaved;
use App\Listeners\LogSubmissionSaved;
use Illuminate\Support\Facades\Log;
use Tests\TestCase;

class LogSubmissionSavedTest extends TestCase
{
    public function test_log_submission_saved_with_valid_data()
    {
        $submissionDTO = new SubmissionDTO(
            'John Doe',
            'john@example.com',
            'Hello World'
        );

        $event = new SubmissionSaved($submissionDTO);

        Log::shouldReceive('info')
            ->once()
            ->with('Submission saved: ', [
                'name' => $submissionDTO->name,
                'email' => $submissionDTO->email,
            ]);

        $listener = new LogSubmissionSaved();
        $listener->handle($event);
    }

    public function test_log_submission_saved_with_empty_data()
    {
        $submissionDTO = new SubmissionDTO(
            '',
            '',
            ''
        );

        $event = new SubmissionSaved($submissionDTO);

        Log::shouldReceive('info')
            ->once()
            ->with('Submission saved: ', ['name' => '', 'email' => '']);

        $listener = new LogSubmissionSaved();
        $listener->handle($event);
    }
}
