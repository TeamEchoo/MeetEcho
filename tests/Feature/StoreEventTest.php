<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class StoreEventTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_store()
    {
        $response = $this->get('/CreateEvents');

        $response->assertStatus(200);
    }
}
