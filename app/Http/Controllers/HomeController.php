<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $questions = Question::with('topic')->with('user')->latest()->get();
        return view('home.index', ['questions' => $questions]);
    }
}
