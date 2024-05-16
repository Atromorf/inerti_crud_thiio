<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;

class ExampleTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test that a logged-in user can access the dashboard.
     *
     * @return void
     */
    public function test_the_application_returns_a_successful_response()
    {
        // Crear un usuario
        $user = User::factory()->create();

        // Autenticar al usuario
        $response = $this->actingAs($user)->get('/dashboard');

        // Verificar el código de estado
        $response->assertStatus(200);
    }
}


