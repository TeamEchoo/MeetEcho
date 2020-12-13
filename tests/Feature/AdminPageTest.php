<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Event;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Str;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;


class adminPageTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_adminUser_can_see_eventList_on_adminPage()
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

    public function test_adminUser_can_see_eventDetail_on_adminPage()
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
}
