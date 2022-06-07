<?php

namespace Tests\Feature\Http\Controllers\Api\v1;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class VacancyControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_store()
    {
        /**
         * "name": "Frontend Developer",
         * "user_id": "uuid of auth0",
         * "postulation_deadline": "2022-05-01 13:50:45",
         * "description": "Details contract.",
         * "status": 1,
         * "salary": 1500,
         * "company_id": 1,
         * "typeWork": 1,
         * "job_location": "cra 23 # 11 -62 Bucaramanga Santander",
         * "skills": "React, Php, Node, Angular",
         * "hours_per_week": 48,
         * "minimum_experience": 5         */
        $response = $this->post('api/v1/vacancies', [
            'name' => $this->faker->name(),
            'postulation_deadline' => '2022-05-01 13:50:45',
            'description' => $this->faker->paragraph(),
            'status' => 1,
            'salary' => 1000,
            'company_id' => 1,
            'typeWork' => 1,
            'job_location' => 'address',
            'skills' => 'React, Php, Node, Angular',
            'hours_per_week' => 40,
            'minimum_experience' => 1,
            'user_id' => 'user-id'
        ]);

        $response->assertJsonStructure([
            "data" => [
                'id',
                'name',
                'postulation_deadline',
                'description',
                'status',
                'salary',
                'company_id',
                'typeWork',
                'job_location',
                'skills',
                'hours_per_week',
                'minimum_experience',
                'created_at'
            ],
        ]);
    }
}
