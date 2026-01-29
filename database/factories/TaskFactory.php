<?php

namespace Database\Factories;
use App\Models\Task;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{

    protected $model = Task::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::Factory(),
            'title' =>$this->faker->sentence(5),
            'description' => $this->faker->paragraph(),
            'priority' => $this->faker->randomElement(['low' , 'medium' , 'high']),
            'status' => $this->faker->randomElement(['todo' , 'in_progress' , 'done']),
            'deadline' => $this->faker->optional()->dateTime('now'),
        ];
    }
}
