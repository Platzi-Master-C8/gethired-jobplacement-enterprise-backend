<?php

namespace App\Http\Resources\v1;

use App\Models\Company;
use Illuminate\Http\Resources\Json\JsonResource;

class CompanyResource extends JsonResource
{
    /**
     * @param $request
     * @return array
     */
    public function toArray($request): array
    {
        /** @var Company $this */
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'description' => $this->description,
            'address' => $this->address,
            'website' => $this->website,
            'country' => $this->country,
            'city' => $this->city,
            'active' => $this->active,
        ];
    }
}
