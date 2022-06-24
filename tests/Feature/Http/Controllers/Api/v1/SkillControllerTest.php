<?php

namespace Tests\Feature\Http\Controllers\Api\v1;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SkillControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_list(): void
    {
        $this->get(route('v1.skills.list'))
            ->assertSuccessful()
            ->assertJsonStructure([
                'data',
                'message',
            ]);

        $this->assertDatabaseHas('skills', [
            'name' => 'javascript',
        ]);
    }

    public function test_store()
    {
        $response = $this->post(route('v1.skills.store'), [
            'name' => 'skill_from_test',
        ]);

        $response->assertSuccessful()
            ->assertStatus(201)
            ->assertJsonStructure([
                'data',
                'message',
            ]);

        $this->assertDatabaseHas('skills', [
            'name' => 'skill_from_test',
        ]);
    }

    public function test_store_when_skill_exists()
    {
        $response = $this->post(route('v1.skills.store'), [
            'name' => 'javascript',
        ]);

        $response->assertStatus(422)->assertJsonStructure([
            'message',
            'errors',
        ]);
    }

    protected function afterRefreshingDatabase(): void
    {
        parent::afterRefreshingDatabase();
    }
}
