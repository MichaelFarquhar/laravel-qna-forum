<?php

namespace App\Http\Controllers;

use App\Models\Question;

class HomeController extends Controller
{
    public function index()
    {
        // Latest question
        $questions = Question::with('topic')->with('user')->latest()->take(20)->get();

        return view('home', compact('questions'));
    }
}
