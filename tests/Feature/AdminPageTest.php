<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Event;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Str;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;


class AdminPageTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testAdminUserCanSeeEventListOnAdminPage()
    {
        $userAdmin = User::create([
            'name' => 'vanessa',
            'email' => 'van@ff.org',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'is_admin' => true,
            'remember_token' => Str::random(10)
        ]);

        $response = $this->actingAs($userAdmin)
            ->get('/admin');

        $response->assertStatus(200)
            ->assertViewIs('admin.adminPage')
            ->assertViewHas('eventList');
    }

    public function testAdminUserCanSeeEventDetailOnAdminPage()
    {
        $userAdmin = User::create([
            'name' => 'vanessa',
            'email' => 'van@ff.org',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'is_admin' => true,
            'remember_token' => Str::random(10)
        ]);

        $event = Event::factory()->create();

        $response = $this->actingAs($userAdmin)
            ->get('/admin/1');

        $response->assertStatus(200)
            ->assertViewIs('admin.adminEventDetail')
            ->assertViewHas('event');
    }
    public function testAdminUserCanChangeHighlightedStatusOnSpecificEvent()
    {
        $userAdmin = User::create([
            'name' => 'vanessa',
            'email' => 'van@ff.org',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'is_admin' => true,
            'remember_token' => Str::random(10)
        ]);

        $event = Event::factory()->create();

        $this->actingAs($userAdmin)->post('admin/1/highlighted');

        $response = Event::find($event->id)->highlighted;

        $this->assertEquals("1", $response);
    }
    public function testAdminUserCanDeleteSpecificEvent()
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

    public function testNonAdminUserCantDeleteSpecificEvent()
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
