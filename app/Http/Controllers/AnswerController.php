<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Question;
use Illuminate\Http\Request;

class AnswerController extends Controller
{
    /**
     * Store a answer for a question.
     */
    public function store(Request $request)
    {
        $request->validate([
            'question_id' => 'required',
            'answer' => ['required', 'max:2000']
        ]);

        Answer::create([
            'user_id' => auth()->user()->id,
            'question_id' => $request->question_id,
            'answer' => $request->answer
        ]);
        
        return back();
    }

    /**
     * Marks an answer as a solution to a question
     */
    public function markAsSolution(Request $request)
    {
        $request->validate([
            'question_id' => 'required',
            'answer_id' => 'required',
        ]);

        $question = Question::find($request->question_id);
        $question->solution = $request->answer_id;
        $question->save();

        return back();
    }
}
