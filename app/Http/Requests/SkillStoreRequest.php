<?php

namespace App\Http\Requests;

use App\Traits\ResponseJsonValidation;
use Illuminate\Foundation\Http\FormRequest;
use JetBrains\PhpStorm\ArrayShape;

class SkillStoreRequest extends FormRequest
{
    use ResponseJsonValidation;

    public function authorize(): bool
    {
        return true;
    }

    #[ArrayShape(['name' => "string"])]
    public function rules(): array
    {
        return [
            'name' => 'required|unique:skills',
        ];
    }
}
