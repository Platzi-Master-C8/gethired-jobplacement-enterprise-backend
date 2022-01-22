<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->email(),
            'description' => $this->faker->paragraph(5),
            'address' => $this->faker->address(),
            'website' => $this->faker->url(),
            'country' => $this->faker->randomElement(['Colombia', 'Chile', 'México']),
            'city' => $this->faker->city(),
        ];
    }
}
