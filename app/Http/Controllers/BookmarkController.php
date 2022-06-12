<?php

namespace App\Http\Controllers;

use App\Models\Bookmark;
use Illuminate\Http\Request;

class BookmarkController extends Controller
{
    /**
     * Show all bookmarks for a user
     */
    public function index()
    {
        $bookmarks = auth()->user()->bookmarks;

        return view('bookmarks.index', ['bookmarks' => $bookmarks]);
    }

    /**
     * Create a new bookmark
     */
    public function store(Request $request)
    {
        $request->validate([
            'question_id' => 'required'
        ]);

        Bookmark::create([
            'user_id' => auth()->user()->id,
            'question_id' => $request->question_id,
        ]);

        return redirect()
            ->back()
            ->with('message', 'Bookmark successfully deleted!');
    }

    /**
     * Delete a bookmark
     */
    public function destroy(Bookmark $bookmark)
    {
        $bookmark->deleteOrFail();

        return redirect()
            ->back()
            ->with('message', 'Bookmark successfully deleted!');
    }
}
