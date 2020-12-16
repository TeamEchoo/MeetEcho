<?php

namespace Tests\Feature;

use App\Mail\SubscribeEventMailable;
use Faker\Factory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Tests\TestCase;
use App\Models\Event;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Testing\Fakes\MailFake;

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

    public function test_registerUser_can_acess_and_view_events_list()
    {
        $response = $this->actingAs(User::factory()->create())
                ->get('/events');
        $response->assertStatus(200)
            ->assertViewIs('events.events');
    }

    public function test_user_can_acess_and_view_a_specific_event_detail()
    {
        Event::factory()->create();
        $response = $this->get('/events/1');

        $response->assertStatus(200)
            ->assertViewIs('events.eventDetail');
    }

    public function test_NonRegisterUser_cannot_enroll_in_specific_event()
    {
        $event = Event::factory(1)->create();
        $user = User::factory(1)->create();

        $response = $this->post('/events/1');

        $response->assertStatus(302);
    }

    public function test_RegisterUser_can_enroll_in_specific_event()
    {
        
        $this->actingAs(User::factory()->create());
        Event::factory(3)->create();

        $response = $this->post('/events/3');

        $response->assertStatus(200)
            ->assertViewIs('users.profile');
        
        $this->assertDatabaseHas('event_user', [
            'event_id' => 3,
            'user_id' => 1
        ]);
    }

    public function test_RegisterUser_cannot_enroll_in_a_full_event()
    {
        $this->actingAs(User::factory()->create());
        Event::create([
            'title'         => "prueba",
            'description'   => "hola",
            'date'          => "2121-12-11",
            'type'          => "masterclass",
            'category'      => "workshop",
            'capacity'      => 0,
            'instructor'    => "lorena",
            'link'          => "https://us02web.zoom.us/j/6120990146?pwd=SzFtT0ZoUFhTU2gyTHNjMDY0MWE0UT09#success"
        ]);

        $response = $this->post('/events/1');

        $response->assertStatus(200)
            ->assertViewIs('users.profile');
        
        $this->assertDatabaseMissing('event_user', [
            'event_id' => 1,
            'user_id' => 1
        ]);
    }

    public function test_RegisterUser_can_cancel_enroll_in_specific_event()
    {
        $this->actingAs(User::factory()->create());
        Event::factory()->create();

        $response = $this->delete('/events/1');

        $response->assertStatus(200)
            ->assertViewIs('users.profile');

        $this->assertDatabaseMissing('event_user', [
                'event_id' => 1,
                'user_id' => 1
            ]);
    }
    
    
    public function test_when_RegisterUser_enroll_in_specific_event_an_email_is_sent()
   {    
        //given
        Mail::fake();
        $userAdmin = User::create([
            'name' => 'vanessa',
            'email' => 'van@ff.org',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'is_admin' => true,
            'remember_token' => Str::random(10)
        ]);
        $event = Event::factory()->create();
        $this->actingAs($userAdmin);
        
        //when
        $this->post('/events/1');
        
        
        //then
        Mail::assertSent(SubscribeEventMailable::class, function ($mail) use ($userAdmin) {
            
            return $mail->hasTo($userAdmin->email);
             
        });
    }
    
}
        
        