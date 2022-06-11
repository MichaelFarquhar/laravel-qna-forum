<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use phpDocumentor\Reflection\Types\Null_;

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
            'topic_id' => 1,
            'title' => 'New question?',
            'content' => $this->faker->text(100),
            'best_answer' => null
        ];
    }
}
