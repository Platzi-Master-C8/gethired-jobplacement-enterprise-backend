<?php

namespace Tests\Feature\Http\Controllers\Api\v1;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class VacancyControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_store()
    {
        // $this->withoutExceptionHandling();
        $response = $this->json('POST', '/v1/vacancies', [
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
        ]);

        $response->assertJsonStructure([
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
            'created_at',
            'update_at',
        ]);
    }
}
