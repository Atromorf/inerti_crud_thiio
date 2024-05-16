<?php

namespace Tests\Unit\Controllers;

use App\Http\Controllers\PostController;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Inertia\Response as InertiaResponse; // Importar la clase Inertia\Response
use Tests\TestCase;
use Inertia\Testing\AssertableInertia as Assert;

class PostControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_index_method_returns_posts()
    {
        // Inicializar la aplicación Laravel
        $this->createApplication();

        // Crear algunos usuarios de prueba
        User::factory()->count(3)->create();

        // Crear una instancia del controlador
        $controller = new PostController();

        // Ejecutar el método index
        $response = $controller->index();

        // Verificar que el método index devuelve una instancia de Inertia\Response
        $this->assertInstanceOf(InertiaResponse::class, $response);
    }

    public function test_create_method_returns_create_view()
    {
        // Inicializar la aplicación Laravel
        $this->createApplication();

        // Crear una instancia del controlador
        $controller = new PostController();

        // Ejecutar el método create
        $response = $controller->create();

        // Verificar que el método create devuelve una instancia de Inertia\Response
        $this->assertInstanceOf(InertiaResponse::class, $response);
    }

    public function test_store_method_creates_user_and_redirects_to_index()
    {
        // Autenticar un usuario
        $user = User::factory()->create();
        $this->actingAs($user);

        // Crear una solicitud falsa con datos simulados
        $requestData = [
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => 'secret'
        ];

        // Ejecutar el método store a través de la ruta
        $response = $this->post(route('posts.store'), $requestData);

        // Verificar que el método store redirige a la ruta 'posts.index'
        $response->assertStatus(302);
        $response->assertRedirect(route('posts.index'));

        // Verificar que se creó un nuevo usuario en la base de datos
        $this->assertDatabaseHas('users', [
            'name' => 'John Doe',
            'email' => 'john@example.com'
        ]);
    }

    public function test_show_method_displays_user()
    {
        // Crear un usuario de prueba
        $user = User::factory()->create();
    
        // Autenticar un usuario
        $this->actingAs($user);
    
        // Ejecutar el método show a través de la ruta
        $response = $this->get(route('posts.show', $user));
    
        // Verificar que el método show devuelve una instancia de Inertia\Response
        $response->assertStatus(200);
    
        // Verificar la estructura de la respuesta
        $response->assertInertia(function (Assert $page) use ($user) {
            $page->component('Posts/Show')
                ->has('post', function (Assert $page) use ($user) {
                    $page->where('id', $user->id)
                        ->where('name', $user->name)
                        ->where('email', $user->email)
                        ->etc();
                });
        });
    }

    public function test_update_method_updates_user_and_redirects_to_index()
    {
        // Crear un usuario de prueba
        $user = User::factory()->create();

        // Autenticar un usuario
        $this->actingAs($user);

        // Simular datos de solicitud
        $requestData = [
            'id' => $user->id,
            'name' => 'Updated Name',
            'email' => 'updated@example.com',
            'password' => 'newpassword'
        ];

        // Ejecutar el método update a través de la ruta
        $response = $this->post(route('posts.update'), $requestData);

        // Verificar que el método update redirige a la ruta 'posts.index'
        $response->assertStatus(302);
        $response->assertRedirect(route('posts.index'));

        // Verificar que se actualizó el usuario en la base de datos
        $this->assertDatabaseHas('users', [
            'id' => $user->id,
            'name' => 'Updated Name',
            'email' => 'updated@example.com'
        ]);
    }

    public function test_destroy_method_deletes_user_and_redirects_to_index()
    {
        // Deshabilitar el middleware de autenticación para las pruebas
        $this->withoutMiddleware();
    
        // Crear un usuario de prueba
        $user = User::factory()->create();
    
        // Ejecutar el método destroy a través de la ruta
        $response = $this->get(route('posts.destroy', $user));
    
        // Verificar que el método destroy redirige a la ruta 'posts.index'
        $response->assertStatus(302);
        $response->assertRedirect(route('posts.index'));
    }
}


