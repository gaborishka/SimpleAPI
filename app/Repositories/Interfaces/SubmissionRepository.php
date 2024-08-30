<?php

namespace App\Repositories\Interfaces;

use App\DTOs\SubmissionDTO;

interface SubmissionRepository
{
    public function create(SubmissionDTO $submissionDTO): SubmissionDTO;
}
