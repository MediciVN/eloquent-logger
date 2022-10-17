<?php

namespace Medicivn\EloquentLogger\Tests\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Medicivn\EloquentLogger\Tests\Models\UserTest;

class UserTestFactory extends Factory
{
    protected $model = UserTest::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'status' => random_int(1, 5)
        ];
    }
}
