<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Topic;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function index()
    {
        $questions = Question::with('topic')->with('user')->latest()->get();
        return view('questions.index', ['questions' => $questions]);
    }

    public function create()
    {
        $topics = Topic::all();
        return view('questions.create', ['topics' => $topics]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required'
        ]);

        Question::create([
            'title' => $request->title,
            'content' => $request->content
        ]);

        $success = "Question created successfully.";
        return redirect()->back()->with(['success' => $success]);
    }
}
