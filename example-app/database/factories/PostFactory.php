<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // 'title' => fake() -> text(20),//何故かラテン語になったので。仕様でtext()はLorem Ipsum(意味のないラテン語)を返すらしい？
            // 'body' => fake() -> text(50),
            'title' => fake() -> realText(20),
            'body' => fake() -> realText(50),
            'user_id' => \App\Models\User::factory(),
            //
        ];
    }
}
