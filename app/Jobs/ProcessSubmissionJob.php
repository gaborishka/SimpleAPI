<?php

namespace App\Jobs;

use App\DTOs\SubmissionDTO;
use App\Events\SubmissionSaved;
use App\Repositories\Interfaces\SubmissionRepository;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ProcessSubmissionJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function __construct(
        protected SubmissionDTO        $submissionDTO,
        protected SubmissionRepository $submissionRepository
    )
    {

    }

    public function handle(): void
    {
        $submission = $this->submissionRepository->create($this->submissionDTO);

        event(new SubmissionSaved($submission));
    }
}
