<?php


namespace Database\Factories;

use App\Models\Company;
use App\Models\User;
use App\Models\Vacancy;
use Illuminate\Database\Eloquent\Factories\Factory;

class VacancyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @var string
     */

    protected $model = Vacancy::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */

    public function definition()
    {
        return [

            'name' => $this->faker->randomElement(['Front-end developer', 'Back-end developer', 'Data Analyst', 'UI Desing', 'UX Design']),
            'user_id' => User::factory(),
            'postulation_deadline' => $this->faker->date(),
            'description' => $this->faker->paragraph(),
            'status' => $this->faker->boolean(),
            'salary' => $this->faker->numberBetween($min = 1150000, $max = 10000000),
            'company_id' => Company::factory(),
            'typeWork' => $this->faker->randomElement(['Full-time', 'Part-time', 'Remote']),
            'job_location' => $this->faker->streetAddress(),
            'skills' => $this->faker->sentence(),
            'hours_per_week' => $this->faker->numberBetween($min = 12, $max = 48),
            'minimum_experience' => $this->faker->numberBetween($min = 1, $max = 10)
        ];
    }
}
