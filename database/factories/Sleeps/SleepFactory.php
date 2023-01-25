<?php

namespace Database\Factories\Sleeps;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Sleeps\Sleep>
 */
class SleepFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        $dates = [];

        $dates['sleep_start_at'] = fake()->dateTimeBetween('-1 year', '+1 year');
        $minutes = rand(5,59);
        $sleep_finish_at = Carbon::parse($dates['sleep_start_at'])->addMinute($minutes);
        $dates['sleep_finish_at'] = $sleep_finish_at;

        return [
            'sleep_start_at' => $dates['sleep_start_at'],
            'sleep_finish_at' =>  $dates['sleep_finish_at'],
            'user_id' => 1,
        ];
    }
}
