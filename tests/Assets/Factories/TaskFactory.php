<?php

namespace Sfneal\Helpers\Time\Tests\Assets\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Sfneal\Helpers\Time\Tests\Assets\Models\Task;

class TaskFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Task::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'total_duration' => $this->faker->randomFloat(2, 1, 240),
        ];
    }
}
