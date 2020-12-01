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
    public function test_if_Events_Route()
    {
        $response = $this->get('/events');

        $response->assertStatus(200);
    }

    public function testEventsPrintView()
    {
        $response = $this->get('/events');

        $response->assertSee("Hola People");
    }

    public function testGetEventsList()
    {

        $events = Event::factory(2)->create();
        $this->assertCount(2, $events);
    }

    public function test_if_user_is_attach_to_event()
    {

        $event = Event::factory(1)->create();
        User::factory(4)->create();


        $registerUsers = User::find([3]);
        $event[0]->users()->attach($registerUsers);
        dd($event[0]->users);
    }
}
