<?php

namespace Database\Factories;

use App\Models\Applicant;
use App\Models\Vacancy;
use Illuminate\Database\Eloquent\Factories\Factory;

class VacancyApplicantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'applicant_id' => Applicant::factory(),
            'vacancy_id' => Vacancy::factory(),
        ];
    }
}
