<?php

namespace Tests\Feature;

use Faker\Factory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Request;
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
    public function test_admin_users_can_access_create_event_view(Request $request)
    {
        $user = User::factory()->make([
            'is_admin' => 'true',
        ]);

        //is admin?

        //result
    }

    
}
