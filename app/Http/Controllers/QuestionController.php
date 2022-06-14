<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class QuestionController extends Controller
{
    /**
     * Show all questions
     */
    public function index()
    {
        $questions = Question::with('topic')->with('user')->latest()->get();
        return view('questions.index', ['questions' => $questions]);
    }

    /**
     * Form to create a new question
     */
    public function create()
    {
        $topics = Topic::all();
        return view('questions.create', ['topics' => $topics]);
    }

    /**
     * Store new question in database
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'max:100'],
            'content' => 'required',
            'topic' => 'required',
        ]);

        $topic_id = 0;

        // New topics will be sent as their topic name, while old topics are sent that their id.
        // If a non-number string is sent, create a new topic with that text
        if (preg_match('~[0-9]+~', $request->topic)) {
            $topic_id = $request->topic;
        } else {
            $topic_id = Topic::create([
                'name' => $request->topic,
                'slug' => Str::slug($request->topic)
            ])->id;
        }

        $question = Question::create([
            'user_id' => auth()->user()->id,
            'topic_id' => $topic_id,
            'title' => $request->title,
            'content' => $request->content,
            'slug' => Str::slug($request->title)
        ]);

        $message = "Question created successfully.";
        return redirect()
            ->back()
            ->with('message', $message);
    }

    /**
     * Show individual question
     * at route -> "/q/id/slug"
     */
    public function show(Question $question, $slug)
    {
        return view('questions.show', ['question' => $question]);
    }
}
