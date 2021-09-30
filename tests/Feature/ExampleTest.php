<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $users = factory(\App\Models\Suara::class, 1000)->make();

        foreach ($users as $key => $value) {
            $value->save();
        }
        $this->assertCount(6, $users);
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
