<?php

namespace App\Http\Resources\v1;

use App\Models\Company;
use App\Models\TypeWork;
use App\Models\Vacancy;
use Illuminate\Http\Resources\Json\JsonResource;

class VacancyResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request): array
    {
        /** @var Vacancy $this */
        $skills = explode(',', $this->skills);
        $skillsFormat = [];
        foreach ($skills as $skill) {
            $skillsFormat[] = trim($skill);
        }

        /** @var TypeWork $typeWork */
        $typeWork = $this->typework;
        /** @var Company $company */
        $company = $this->company;

        return [
            'id' => $this->id,
            'name' => $this->name,
            'user_id' => $this->user_id,
            'postulation_deadline' => $this->postulation_deadline,
            'description' => $this->description,
            'status' => $this->status,
            'salary' => $this->salary,
            'company_id' => $this->company_id,
            'typeWork' => $typeWork->name,
            'job_location' => $this->job_location,
            'skills' => $skillsFormat,
            'skills_raw' => $this->skills,
            'hours_per_week' => $this->hours_per_week,
            'minimum_experience' => $this->minimum_experience,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'type_work_id' => $this->typeWork,
            'company' => [
                'id' => $company->id,
                'name' => $company->name,
            ],
            'applicants' => $this->applicants->pluck('applicant_id')->all(),
        ];
    }
}
