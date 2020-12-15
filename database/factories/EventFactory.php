<?php

namespace Database\Factories;

use App\Models\Event;
use Illuminate\Database\Eloquent\Factories\Factory;

class EventFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Event::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "title" => "This Awesome Event",
            "description" => $this->faker->text,
            "date" => $this->faker->dateTimeBetween($startDate = 'now', $endDate = '+3 years', $timezone = null),
            "type" => $this->faker->word,
            "category" => $this->faker->word,
            "capacity" => 25,
            "instructor" => $this->faker->name,
            "link" => "http://ecomeet.com/event1",  
            "timedOut" => false,

        ];
    }
}
