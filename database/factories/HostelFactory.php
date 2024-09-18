<?php

namespace Database\Factories;

use App\Models\Hostel;
use Illuminate\Database\Eloquent\Factories\Factory;

class HostelFactory extends Factory
{
    protected $model = Hostel::class;

    public function definition()
    {
        return [
            'name' => $this->faker->company(),
            'gender' => $this->faker->randomElement(['male', 'female']),
            'available_double_rooms' => $this->faker->numberBetween(1, 50),
            'available_single_rooms' => $this->faker->numberBetween(1, 50),
        ];
    }
}
