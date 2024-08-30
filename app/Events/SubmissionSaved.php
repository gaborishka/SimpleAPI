<?php

namespace App\Events;

use App\DTOs\SubmissionDTO;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class SubmissionSaved
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public function __construct(public SubmissionDTO $submissionDTO)
    {
    }
}
