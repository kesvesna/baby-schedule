<?php

namespace Database\Factories\Walks;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Walks\Walk>
 */
class WalkFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        $dates = [];

        $dates['walk_start_at'] = fake()->dateTimeBetween('-1 year', '+1 year');
        $minutes = rand(5,59);
        $sleep_finish_at = Carbon::parse($dates['walk_start_at'])->addMinute($minutes);
        $dates['walk_finish_at'] = $sleep_finish_at;
        $dates['walk_time'] = Carbon::parse(date('00:00:s'))->addMinute($minutes);

        return [
            'walk_start_at' => $dates['walk_start_at'],
            'walk_finish_at' =>  $dates['walk_finish_at'],
            'walk_time' => $dates['walk_time'],
            'user_id' => 1,
        ];
    }
}
