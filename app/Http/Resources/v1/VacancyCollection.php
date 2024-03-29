<?php

namespace App\Http\Resources\v1;

use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Support\Collection;

class VacancyCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array<string,string>
     */
    public function toArray($request): array
    {
        return [
            'data' => $this->collection,
        ];
    }
}
