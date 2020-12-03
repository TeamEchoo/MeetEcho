<?php

namespace Tests\Feature;

use Faker\Factory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Event;
use App\Models\User;

class EventTest extends TestCase
{

    use RefreshDatabase;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_user_can_acess_and_view_events_list()
    {
        $response = $this->get('/events');

        $response->assertStatus(200)
            ->assertViewIs('events.events');
    }

    public function test_user_can_acess_and_view_a_specific_event_detail()
    {
        $event = Event::factory(1)->create();
        $response = $this->get('/events/1');

        $response->assertStatus(200)
            ->assertViewIs('events.eventDetail');
    }

    public function test_NonRegisterUser_cannot_enroll_in_specific_event()
    {
        $event = Event::factory(1)->create();
        $user = User::factory(1)->create();
        
        $response = $this->post('/events/1');

        $response->assertStatus(200)
            ->assertViewIs('auth.register');
    }

    public function test_RegisterUser_can_enroll_in_specific_event()
    {
        $event = Event::factory(1)->create();
        $user = User::factory(1)->create();
        
        $response = $this->post('/events/1');

        $response->assertStatus(200)
            ->assertViewIs('events.events');
    }
}
