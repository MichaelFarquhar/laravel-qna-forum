<?php

namespace App\Http\Controllers;

use App\Models\Answer;
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
        
        return redirect()->back();
    }

    /**
     * Updating an answer, mainly used to update an upvote
     */
    // public function update(Request $request){

    // }
}
