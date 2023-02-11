<?php

namespace Database\Factories\Diapers;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Diapers\Diaper>
 */
class DiaperFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        $dates = [];

        $dates['changed_at'] = fake()->dateTimeBetween('-1 year', '+1 year');

        return [
            'changed_at' => $dates['changed_at'],
            'user_id' => 1,
        ];
    }
}
