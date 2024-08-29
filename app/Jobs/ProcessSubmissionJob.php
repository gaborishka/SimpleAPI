<?php

namespace App\Jobs;

use App\DTOs\SubmissionDTO;
use App\Models\Submission;
use App\Events\SubmissionSaved;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ProcessSubmissionJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected SubmissionDTO $submissionDTO;

    public function __construct(SubmissionDTO $submissionDTO)
    {
        $this->submissionDTO = $submissionDTO;
    }

    public function handle(): void
    {
        $submission = Submission::create([
            'name'    => $this->submissionDTO->name,
            'email'   => $this->submissionDTO->email,
            'message' => $this->submissionDTO->message,
        ]);

        event(new SubmissionSaved($submission));
    }
}
