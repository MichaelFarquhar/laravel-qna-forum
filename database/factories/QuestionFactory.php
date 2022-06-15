<?php

namespace Database\Factories;

use App\Models\Topic;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Question>
 */
class QuestionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $title = $this->faker->text(25).'?';
        $randomDate = $this->faker->dateTimeThisMonth();
        
        return [
            'user_id' => User::all()->random()->id,
            'topic_id' => Topic::all()->random()->id,
            'title' => $title,
            'content' => $this->faker->text(100),
            'slug' => Str::slug($title),
            'solution' => null,
            'created_at' => $randomDate,
            'updated_at' => $randomDate
        ];
    }
}
