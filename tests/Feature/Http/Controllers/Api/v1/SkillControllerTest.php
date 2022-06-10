<?php

namespace Tests\Feature\Http\Controllers\Api\v1;

use Tests\TestCase;

class SkillControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
