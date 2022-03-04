<?php

namespace App\Http\Resources\v1;

use Illuminate\Http\Resources\Json\JsonResource;

class InterviewResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            "id" => $this - id,
            "user_id" => $this->user_id,
            "applicant_id" => $this->applicant_id,
            "vacancy_id" => $this->vacancy_id,
            "platform" => $this->platform,
            "url" => $this->url,
            "type" => $this->type,
            "active" => $this->active,
            "status_finished" => $this->status_finished,
            "notes" => $this->notes,
            "date" => $this->date,
            "created_at" => $this->created_at,
            "updated_at" => $this->updated_at,
            "vacancy" => [
                "id" => $this->vacancy->id,
                "name" => $this->vacancy->name
            ],
        ];
    }
}
