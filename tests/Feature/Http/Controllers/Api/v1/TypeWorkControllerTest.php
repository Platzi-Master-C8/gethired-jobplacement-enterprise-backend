<?php

namespace Http\Controllers\Api\v1;

use App\Models\TypeWork;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TypeWorkControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_can_list()
    {
        $this->get(route('v1.types-work.list'))
            ->assertSuccessful()
            ->assertJsonStructure([
                'data',
                'message',
            ]);

        $this->assertDatabaseHas('types_work', [
            'name' => 'Remote',
        ]);
    }

    public function test_it_can_store()
    {
        $response = $this->post(route('v1.types-work.store'), [
            'name' => 'type_from_test',
        ]);

        $response->assertSuccessful()
            ->assertStatus(201)
            ->assertJsonStructure([
                'data',
                'message',
            ]);

        $this->assertDatabaseHas('types_work', [
            'name' => 'type_from_test',
        ]);
    }

    public function test_it_can_store_validation()
    {
        $response = $this->post(route('v1.types-work.store'), [
            'name' => 'Remote',
        ]);

        $response->assertStatus(422)->assertJsonStructure([
            'message',
            'errors',
        ]);
    }

    public function test_it_can_update()
    {
        $model = TypeWork::create([
            'name' => 'type_from_test',
        ]);

        $response = $this->put(route('v1.types-work.update', $model), [
            'name' => 'type_from_test',
        ]);

        $response->assertSuccessful()
            ->assertStatus(200)
            ->assertJsonStructure([
                'data',
                'message',
            ]);

        $this->assertDatabaseHas('types_work', [
            'name' => 'type_from_test',
            'id' => $model->id,
        ]);
    }

    public function test_it_can_update_validation()
    {
        $model = TypeWork::create([
            'name' => 'type_from_test',
        ]);

        $response = $this->put(route('v1.types-work.update', $model), [
            'name' => 'Remote',
        ]);

        $response->assertStatus(422)->assertJsonStructure([
            'message',
            'errors',
        ]);
    }

    public function test_it_can_destroy()
    {
        $model = TypeWork::create([
            'name' => 'type_from_test',
        ]);

        $this->delete(route('v1.types-work.destroy', $model))
            ->assertSuccessful()
            ->assertJsonStructure([
                'message',
            ]);

        $this->assertDatabaseMissing('types_work', [
            'name' => 'type_from_test',
        ]);
    }

    protected function afterRefreshingDatabase()
    {
        parent::afterRefreshingDatabase();
    }
}
