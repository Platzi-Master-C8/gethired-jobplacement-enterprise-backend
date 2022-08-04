<?php

namespace App\Http\Requests;

use App\Models\TypeWork;
use App\Traits\ResponseJsonValidation;
use Illuminate\Foundation\Http\FormRequest;

class TypeWorkStoreRequest extends FormRequest
{
    use ResponseJsonValidation;

    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array<string, string>
     */
    public function rules(): array
    {
        if ($this->getMethod() === 'PUT') {
            /** @var TypeWork $typeWork */
            $typeWork = $this->typeWork;

            return [
                'name' => 'required|unique:types_work,name,' . $typeWork->id,
            ];
        }

        return [
            'name' => 'required|unique:types_work',
        ];
    }
}
