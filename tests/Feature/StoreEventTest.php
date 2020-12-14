<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Str;
use Tests\TestCase;
use App\Models\Event;
use App\Models\User;

class StoreEventTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_store()
    {

        $userAdmin = User::create([
            'name' => 'lorena',
            'email' => 'criado@gmail.com',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'is_admin' => true,
        ]);

        $this->actingAs($userAdmin);
        $response = $this->get('/CreateEvents')
        ->assertStatus(200)
        ->assertViewIs('CreateEvents');
    }

    public function test_adminUser_can_create_and_store_event()
    {
        $data = [
                'title'         => "prueba",
                'description'   => "hola",
                'date'          => "2121-12-11",
                'type'          => "masterclass",
                'category'      => "workshop",
                'capacity'      => 12,
                'instructor'    => "lorena",
                'link'          => "link"
        ];

        $userAdmin = User::create([
            'name' => 'lorena',
            'email' => 'criado@gmail.com',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'is_admin' => true,
        ]);

        $response = $this->actingAs($userAdmin)
        ->post('/CreateEvents', $data)
        ->assertStatus(302);
        $this->assertDatabaseCount('events', 1);
    }

    public function test_User_cant_create_and_store_event()
    {
   
        $data = [
                'title'         => "prueba",
                'description'   => "hola",
                'date'          => "2121-12-11",
                'type'          => "masterclass",
                'category'      => "workshop",
                'capacity'      => 12,
                'instructor'    => "lorena",
                'link'          => "link"
        ];

        $user = User::create([
            'name' => 'lorena',
            'email' => 'criado@gmail.com',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'is_admin' => false,
        ]);

        $response = $this->actingAs($user)
        ->post('/CreateEvents', $data);
        $this->assertDatabaseCount('events', 0);
    }
}
