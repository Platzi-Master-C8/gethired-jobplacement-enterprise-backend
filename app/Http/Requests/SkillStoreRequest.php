<?php

namespace App\Http\Requests;

use App\Traits\ResponseJsonValidation;
use Illuminate\Foundation\Http\FormRequest;

class SkillStoreRequest extends FormRequest
{
    use ResponseJsonValidation;

    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array<string,string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|unique:skills',
        ];
    }
}
