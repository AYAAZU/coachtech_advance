<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class ReseTest extends TestCase
{
    use RefreshDatabase;

    public function test_route()
    {
        $this->assertTrue(true);

        $response = $this->get('/');
        $response->assertStatus(200);

        $response = $this->get('/register');
        $response->assertStatus(200);

        $response = $this->get('/login');
        $response->assertStatus(200);

        $response = $this->get('/no_route');
        $response->assertStatus(404);
    }
}
