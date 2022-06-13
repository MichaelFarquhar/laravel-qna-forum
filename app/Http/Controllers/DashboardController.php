<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $questions_count = auth()->user()->questions->count();
        $answers_count = auth()->user()->answers->count();
        $solutions_count = 0;
        return view('dashboard.index', compact('questions_count', 'answers_count', 'solutions_count'));
    }
}
