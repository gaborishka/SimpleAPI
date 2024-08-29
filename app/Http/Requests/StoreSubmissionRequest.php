<?php

namespace App\Http\Requests;

use App\DTOs\SubmissionDTO;
use Illuminate\Foundation\Http\FormRequest;

class StoreSubmissionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'message' => 'required|string',
        ];
    }

    public function toDTO(): SubmissionDTO
    {
        $data = $this->validated();
        return new SubmissionDTO(
            $data['name'],
            $data['email'],
            $data['message']
        );
    }
}
