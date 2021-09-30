<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DatabaseTester extends TestCase
{
    public function testfactoryDatabase()
    {
        $users = factory(\App\Models\Suara::class, 3)->make();
        var_dump($users);
    }
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        \App\Models\Suara::create([
            'suara' => 'Melolong'
        ]);
        $response = $this->get('/');

        $response->assertStatus(300);
    }
}
