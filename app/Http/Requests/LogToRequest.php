<?php

namespace App\Http\Requests;

use App\Enums\LoggerType;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class LogToRequest extends FormRequest
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
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'message' => ['required'],
            'type' => ['required', Rule::in(array_column(LoggerType::cases(), 'value'))]
        ];
    }
}
