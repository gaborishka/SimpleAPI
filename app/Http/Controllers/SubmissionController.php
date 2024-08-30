<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSubmissionRequest;
use App\Jobs\ProcessSubmissionJob;
use App\Repositories\Interfaces\SubmissionRepository;
use Illuminate\Http\JsonResponse;

class SubmissionController extends Controller
{
    public function store(StoreSubmissionRequest $request): JsonResponse
    {
        ProcessSubmissionJob::dispatch($request->toDTO(), app(SubmissionRepository::class));

        return response()->json(['message' => 'Submission queued for processing'], 200);
    }
}
