<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Latest question
        $newest_questions = Question::with('topic')->with('user')->latest()->take(10)->get();

        return view('home', compact('newest_questions'));
    }
}
