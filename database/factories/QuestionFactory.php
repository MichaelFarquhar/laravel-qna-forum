<?php

namespace Database\Factories;

use App\Models\Topic;
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
        return [
            'user_id' => 1,
            'topic_id' => Topic::all()->random()->id,
            'title' => 'What is your favourite food?',
            'content' => $this->faker->text(100),
            'slug' => Str::slug('What is your favourite food?'),
            'best_answer' => null
        ];
    }
}
