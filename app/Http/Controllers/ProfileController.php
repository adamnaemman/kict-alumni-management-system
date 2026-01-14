<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function show()
    {
        $user = auth()->user();
        $achievements = \App\Models\Achievement::where('user_id', $user->id)->latest()->get();
        return view('profile.show', compact('user', 'achievements'));
    }

    public function edit()
    {
        $user = auth()->user();
        return view('profile.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $user = auth()->user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'student_id' => 'nullable|string',
            'graduation_year' => 'nullable|string',
            'program' => 'nullable|string',
            'current_position' => 'nullable|string',
            'current_company' => 'nullable|string',
            'phone_number' => 'nullable|string',
            'gender' => 'nullable|string|in:Male,Female,Others',
            'birthdate' => 'nullable|date',
            'address' => 'nullable|string',
            'postcode' => 'nullable|string|max:10',
            'state' => 'nullable|string',
            'race' => 'nullable|string',
            'linkedin_url' => 'nullable|url',
            'bio' => 'nullable|string',
        ]);

        // Directly update user profile
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'student_id' => $request->student_id,
            'graduation_year' => $request->graduation_year,
            'program' => $request->program,
            'current_position' => $request->current_position,
            'current_company' => $request->current_company,
            'phone_number' => $request->phone_number,
            'gender' => $request->gender,
            'birthdate' => $request->birthdate,
            'address' => $request->address,
            'postcode' => $request->postcode,
            'state' => $request->state,
            'race' => $request->race,
            'linkedin_url' => $request->linkedin_url,
            'bio' => $request->bio,
        ]);

        return redirect()->route('profile.show')->with('success', 'Your profile has been updated successfully!');
    }
}
