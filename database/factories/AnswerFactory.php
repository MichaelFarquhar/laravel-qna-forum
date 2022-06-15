<?php

namespace Database\Factories;

use App\Models\Question;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Answer>
 */
class AnswerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        // Get random question and make answer date sometime after the questions date
        $question = Question::all()->random();
        $randomDate = $this->faker->dateTimeBetween($question->created_at);

        return [
            'user_id' => User::all()->random()->id,
            'question_id' => $question->id,
            'answer' => $this->faker->text(400),
            'created_at' => $randomDate,
            'updated_at' => $randomDate
        ];
    }
}
