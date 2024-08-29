<?php

namespace App\DTOs;

class SubmissionDTO
{
    public string $name;
    public string $email;
    public string $message;

    public function __construct(string $name, string $email, string $message)
    {
        $this->name = $name;
        $this->email = $email;
        $this->message = $message;
    }
}
