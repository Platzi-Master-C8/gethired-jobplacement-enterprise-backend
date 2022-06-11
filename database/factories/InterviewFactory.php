<?php

namespace Database\Factories;

use App\Models\Company;
use App\Models\Interview;
use App\Models\User;
use App\Models\Vacancy;
use Illuminate\Database\Eloquent\Factories\Factory;

class InterviewFactory extends Factory
{
    protected $model = Interview::class;

    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'company_id' => Company::factory(),
            'applicant_id' => $this->faker->randomNumber(),
            'vacancy_id' => Vacancy::factory(),
            'platform' => $this->faker->randomElement(['Google Meet', 'Slack', 'Skype', 'Zoom']),
            'url' => $this->faker->url(),
            'type' => $this->faker->randomElement(['Remoto', 'Face to Face Meeting']),
            'active' => $this->faker->boolean(),
            'status_finished' => $this->faker->randomElement(['Canceled', 'Finished']),
            'notes' => $this->faker->paragraph(),
            'date' => $this->faker->dateTime(),
        ];
    }
}
