<?php

namespace Tests\Unit;

use App\DTOs\SubmissionDTO;
use App\Events\SubmissionSaved;
use App\Jobs\ProcessSubmissionJob;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Event;
use Tests\TestCase;

class ProcessSubmissionJobTest extends TestCase
{
    use RefreshDatabase;

    public function test_submission_is_processed_correctly()
    {
        $submissionDTO = new SubmissionDTO(
            'John Doe',
            'john@example.com',
            'Hello World'
        );

        $job = new ProcessSubmissionJob($submissionDTO);

        Event::fake();

        $job->handle();

        $this->assertDatabaseHas('submissions', [
            'name' => $submissionDTO->name,
            'email' => $submissionDTO->email,
            'message' => $submissionDTO->message,
        ]);

        Event::assertDispatched(SubmissionSaved::class);
    }

    public function test_submission_with_empty_fields()
    {
        $submissionDTO = new SubmissionDTO('', '', '');
        $job = new ProcessSubmissionJob($submissionDTO);

        Event::fake();

        $job->handle();
        $this->assertDatabaseHas('submissions', [
            'name' => $submissionDTO->name,
            'email' => $submissionDTO->email,
            'message' => $submissionDTO->message,
        ]);

        Event::assertDispatched(SubmissionSaved::class);
    }

    public function test_submission_with_null_fields(): void
    {
        $this->expectException(\TypeError::class);
        new SubmissionDTO(null, null, null);
    }
}
