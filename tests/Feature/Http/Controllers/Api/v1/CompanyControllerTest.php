<?php

namespace Tests\Feature\Http\Controllers\Api\v1;

use App\Models\Company;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CompanyControllerTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function test_list()
    {
        $response = $this->get(route('v1.companies.list'));

        $response->assertStatus(200);

        $response->assertJsonStructure([
            'data',
            'message',
        ]);
    }

    public function test_list_as_select()
    {
        $response = $this->get(route('v1.companies.list-select'));

        $response->assertStatus(200);

        $response->assertJsonStructure([
            'data',
            'message',
        ]);
    }

    public function test_list_with_vacancies()
    {
        $response = $this->get(route('v1.companies.list-with-vacancies'));

        $response->assertStatus(200);

        $response->assertJsonStructure([
            'data',
            'message',
        ]);
    }

    public function test_index_find_one()
    {
        $response = $this->get(route('v1.companies.indexFindOne', 1));

        $response->assertStatus(200);

        $response->assertJsonStructure([
            'data' => [
                'id',
                'name',
                'email',
                'description',
                'address',
                'website',
                'country',
                'city',
                'active',
            ],
        ]);
    }

    public function test_index_find_one_not_found()
    {
        $response = $this->get(route('v1.companies.indexFindOne', 99));

        $response->assertStatus(404);
    }

    public function test_show_with_vacancies()
    {
        $response = $this->get(route('v1.companies.show-with-vacancies', 1));

        $response->assertStatus(200);

        $response->assertJsonStructure([
            'data',
            'message',
            'vacancies',
        ]);
    }

    public function test_show_with_vacancies_not_found()
    {
        $response = $this->get(route('v1.companies.show-with-vacancies', 99));

        $response->assertStatus(404);
    }

    public function test_store()
    {
        $company = [
            'name' => $this->faker->name(),
            'email' => $this->faker->email(),
            'description' => $this->faker->paragraph(5),
            'address' => $this->faker->address(),
            'website' => $this->faker->url(),
            'country' => $this->faker->randomElement(['Colombia', 'Chile', 'México']),
            'city' => $this->faker->city(),
        ];

        $response = $this->post(route('v1.companies.store'), $company);

        $response->assertStatus(201);

        $response->assertJsonStructure([
            'data',
            'message',
        ]);

        $this->assertDatabaseHas('companies', $company);
    }

    public function test_update()
    {
        $company = Company::factory()->create()->first();

        $companyUpdate = [
            'name' => $this->faker->name(),
            'email' => $this->faker->email(),
            'description' => $this->faker->paragraph(5),
            'address' => $this->faker->address(),
            'website' => $this->faker->url(),
            'country' => $this->faker->randomElement(['Colombia', 'Chile', 'México']),
            'city' => $this->faker->city(),
        ];

        $response = $this->patch(route('v1.companies.update', $company->id), $companyUpdate);

        $response->assertStatus(200);

        $response->assertJsonStructure([
            'data',
            'message',
        ]);

        $this->assertDatabaseHas('companies', $companyUpdate);
    }

    public function test_update_not_found()
    {
        $response = $this->patch(route('v1.companies.update', 99), []);

        $response->assertStatus(404);
    }

    protected function afterRefreshingDatabase()
    {
        parent::afterRefreshingDatabase();
    }
}
