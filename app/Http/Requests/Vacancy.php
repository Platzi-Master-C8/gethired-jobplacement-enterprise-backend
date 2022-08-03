<?php

namespace App\Http\Requests;

use App\Traits\ResponseJsonValidation;
use Illuminate\Foundation\Http\FormRequest;
use JetBrains\PhpStorm\ArrayShape;

class Vacancy extends FormRequest
{
    use ResponseJsonValidation;

    public function authorize(): bool
    {
        return true;
    }

    #[ArrayShape([
        'name' => "string",
        'description' => "string",
        'status' => "string",
        'company_id' => "string",
        'typeWork' => "string",
        'job_location' => "string",
        'skills' => "string",
    ])]
    public function rules(): array
    {
        return [
            'name' => 'required',
            'description' => 'required',
            'status' => 'required',
            'company_id' => 'required',
            'typeWork' => 'required',
            'job_location' => 'required',
            'skills' => 'required',
        ];
    }
}
