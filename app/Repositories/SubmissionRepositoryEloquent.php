<?php

namespace App\Repositories;

use App\DTOs\SubmissionDTO;
use App\Models\Submission;
use App\Repositories\Interfaces\SubmissionRepository;

class SubmissionRepositoryEloquent implements SubmissionRepository
{

    public function create(submissionDTO $submissionDTO): SubmissionDTO
    {
         Submission::create([
            'name' => $submissionDTO->name,
            'email' => $submissionDTO->email,
            'message' => $submissionDTO->message,
        ]);

        return $submissionDTO;
    }
}
