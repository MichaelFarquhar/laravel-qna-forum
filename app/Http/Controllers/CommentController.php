<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Store a new comment
     */
    public function store(Request $request)
    {
        $request->validate([
            'answer_id' => 'required',
            'comment' => 'required|max:1000'
        ]);

        Comment::create([
            'user_id' => auth()->user()->id,
            'answer_id' => $request->answer_id,
            'comment' => $request->comment
        ]);

        return redirect()
            ->back()
            ->with('message', 'Successfully added comment');
    }
}
