<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSubmissionRequest;
use App\Jobs\ProcessSubmissionJob;
use Illuminate\Http\JsonResponse;

class SubmissionController extends Controller
{
    public function store(StoreSubmissionRequest $request): JsonResponse
    {
        $data = $request->validated();
        ProcessSubmissionJob::dispatch($data);

        return response()->json(['message' => 'Submission queued for processing'], 200);
    }
}
