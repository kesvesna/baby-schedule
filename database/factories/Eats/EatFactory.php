<?php

namespace Database\Factories\Eats;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Eats\Eat>
 */
class EatFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        $dates = [];

        $dates['eat_start_at'] = fake()->dateTimeBetween('-1 year', '+1 year');
        $minutes = rand(5,59);
        $sleep_finish_at = Carbon::parse($dates['eat_start_at'])->addMinute($minutes);
        $dates['eat_finish_at'] = $sleep_finish_at;
        $dates['eat_time'] = Carbon::parse(date('00:00:s'))->addMinute($minutes);


        return [
            'eat_start_at' => $dates['eat_start_at'],
            'eat_finish_at' =>  $dates['eat_finish_at'],
            'eat_time' => $dates['eat_time'],
            'user_id' => 1,
        ];
    }
}
