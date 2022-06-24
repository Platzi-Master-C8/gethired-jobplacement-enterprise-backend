<?php

namespace App\Http\Requests;

use App\Traits\ResponseJsonValidation;
use Illuminate\Foundation\Http\FormRequest;
use JetBrains\PhpStorm\ArrayShape;

class TypeWorkStoreRequest extends FormRequest
{
    use ResponseJsonValidation;

    public function authorize(): bool
    {
        return true;
    }

    #[ArrayShape(['name' => "string"])]
    public function rules(): array
    {
        if ($this->getMethod() === 'PUT') {
            return [
                'name' => 'required|unique:types_work,name,' . $this->typeWork->id,
            ];
        }

        return [
            'name' => 'required|unique:types_work',
        ];
    }
}
