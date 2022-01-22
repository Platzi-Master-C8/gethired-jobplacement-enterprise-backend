<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ApplicantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'=>$this->faker->name(),
            'email'=>$this->faker->email(),
            'portfolio'=>$this->faker->randomElement(['Github','Behance','Linkedin']),
            'link_portfolio'=>$this->faker->url(),
            'years_experience'=>$this->faker->numberBetween(1,10),
        ];
    }
}
