<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    /**
     * Show report form for question
     */
    public function show(Question $question)
    {
        return view('reports.show', ['question' => $question]);
    }

    /**
     * Submit report for a question
     */
    public function store(Request $request)
    {
        $request->validate([
            'question_id' => 'required',
            'reason' => 'required|max:250'
        ]);

        // We don't actually do anything with these reports. Maybe an update in the future...

        return redirect()
            ->back()
            ->with('message', 'Reported submitted successfully!');
    }
}
