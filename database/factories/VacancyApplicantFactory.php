<?php

namespace Database\Factories;

use App\Models\Vacancy;
use Illuminate\Database\Eloquent\Factories\Factory;

class VacancyApplicantFactory extends Factory
{
    public function definition(): array
    {
        return [
            'applicant_id' => 1,
            'vacancy_id' => Vacancy::factory(),
        ];
    }
}
