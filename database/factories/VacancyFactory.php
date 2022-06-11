<?php

namespace Database\Factories;

use App\Models\Company;
use App\Models\User;
use App\Models\Vacancy;
use Illuminate\Database\Eloquent\Factories\Factory;

class VacancyFactory extends Factory
{
    protected $model = Vacancy::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->randomElement(['Front-end developer', 'Back-end developer', 'Data Analyst', 'UI Desing', 'UX Design']),
            'user_id' => User::factory(),
            'postulation_deadline' => $this->faker->dateTime(),
            'description' => $this->faker->paragraph(),
            'status' => $this->faker->boolean(),
            'salary' => $this->faker->numberBetween($min = 1000, $max = 8000),
            'company_id' => Company::factory(),
            'typeWork' => $this->faker->randomElement(['1', '2', '3']),
            'job_location' => $this->faker->streetAddress(),
            'skills' => $this->faker->sentence(),
            'hours_per_week' => $this->faker->numberBetween($min = 12, $max = 48),
            'minimum_experience' => $this->faker->numberBetween($min = 1, $max = 10),
        ];
    }
}
