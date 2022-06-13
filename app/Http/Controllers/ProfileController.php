<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Get the profile edit form
     */
    public function edit()
    {
        $user = auth()->user();

        return view('profile', ['user' => $user]);
    }

    /**
     * Request to update the profile
     */
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email'
        ]);

        $user = User::find(auth()->user()->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        return redirect()
            ->back()
            ->with('message', 'Profile updated successfully!');
    }
}
