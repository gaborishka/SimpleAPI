<?php

namespace Tests\Unit;

use App\Events\SubmissionSaved;
use App\Listeners\LogSubmissionSaved;
use App\Models\Submission;
use Illuminate\Support\Facades\Log;
use Tests\TestCase;

class LogSubmissionSavedTest extends TestCase
{
    public function test_log_submission_saved_with_valid_data()
    {
        $submission = new Submission();
        $submission->name = 'John Doe';
        $submission->email = 'john@example.com';

        $event = new SubmissionSaved($submission);

        Log::shouldReceive('info')
            ->once()
            ->with('Submission saved: ', [
                'name' => $submission->name,
                'email' => $submission->email,
            ]);

        $listener = new LogSubmissionSaved();
        $listener->handle($event);
    }

    public function test_log_submission_saved_with_empty_data()
    {
        $submission = new Submission();
        $submission->name = '';
        $submission->email = '';

        $event = new SubmissionSaved($submission);

        Log::shouldReceive('info')
            ->once()
            ->with('Submission saved: ', ['name' => '', 'email' => '']);

        $listener = new LogSubmissionSaved();
        $listener->handle($event);
    }

    public function test_log_submission_saved_with_null_data()
    {
        $submission = new Submission();
        $submission->name = null;
        $submission->email = null;

        $event = new SubmissionSaved($submission);

        Log::shouldReceive('info')
            ->once()
            ->with('Submission saved: ', ['name' => null, 'email' => null]);

        $listener = new LogSubmissionSaved();
        $listener->handle($event);
    }
}
