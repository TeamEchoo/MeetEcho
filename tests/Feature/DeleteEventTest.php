<?php

namespace Tests\Feature;

use Faker\Factory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Str;
use Tests\TestCase;
use App\Models\Event;
use App\Models\User;

class DeleteEventTest extends TestCase
{

    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_adminUser_can_delete_a_specific_event()
    {
        $event = Event::factory()->create();
        $userAdmin = User::create([
            'name' => 'vanessa',
            'email' => 'van@ff.org',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'is_admin' => true,
            'remember_token' => Str::random(10)
        ]);

        $response = $this->actingAs($userAdmin)
            ->delete(route('eventsDelete', $event->id))
            ->assertStatus(200);
            $this->assertDatabaseCount('events', 0);
        
    }

    public function test_non_adminUser_cant_delete_a_specific_event()
    {
        $event = Event::factory()->create();
        $userAdmin = User::create([
            'name' => 'vanessa',
            'email' => 'van@ff.org',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'is_admin' => false,
            'remember_token' => Str::random(10)
        ]);

        $response = $this->actingAs($userAdmin)
            ->delete(route('eventsDelete', $event->id))
            ->assertStatus(302);
            $this->assertDatabaseCount('events', 1);
        
    }
}
