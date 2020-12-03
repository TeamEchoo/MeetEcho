<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Event;

class EventUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // foreach (Event::all() as $event) {
        //     $numberOfUsers = rand(0, count(User::all()) - 1);

        //     foreach (User::all() as $key => $user) {
        //         if ($key <= $numberOfUsers) {
        //             $event->users()->attach($user->id);
        //         }
        //     }

        //     $event->save();
        }
}

