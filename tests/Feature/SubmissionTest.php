<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SubmissionTest extends TestCase
{
    use RefreshDatabase;

    public function test_submission_endpoint()
    {
        $response = $this->postJson(route('submit'), [
            'name' => 'John Doe',
            'email' => 'john.doe@example.com',
            'message' => 'This is a test message.'
        ]);

        $response->assertStatus(200)
            ->assertJson([
                'message' => 'Submission queued for processing',
            ]);
    }
}
