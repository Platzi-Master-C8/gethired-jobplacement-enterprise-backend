<?php

namespace App\Http\Resources\v1;

use App\Http\Resources\v1\TypeWorkResource;
use Illuminate\Http\Resources\Json\JsonResource;

class VacancyResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id'                    =>  $this->id,
            'name'                  =>  $this->name,
            'user_id'               =>  $this->user_id,
            'postulation_deadline'  =>  $this->postulation_deadline,
            'description'           =>  $this->description,
            'status'                =>  $this->status,
            'salary'                =>  $this->salary,
            'company_id'            =>  $this->company_id,
            'typeWork'              =>  $this->typework->name,
            'job_location'          =>  $this->job_location,
            'skills'                =>  explode(',', $this->skills),
            'hours_per_week'        =>  $this->hours_per_week,
            'minimum_experience'    =>  $this->minimum_experience,
            'created_at'            =>  $this->created_at,
            'updated_at'            =>  $this->updated_at,
            'company'               =>  [
                'id'   => $this->company->id,
                'name' => $this->company->name,
            ],
        ];
    }
}
