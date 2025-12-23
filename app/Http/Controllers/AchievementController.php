<?php

namespace App\Http\Controllers;

use App\Models\Achievement;
use Illuminate\Http\Request;

class AchievementController extends Controller
{
    public function index()
    {
        $achievements = Achievement::where('user_id', auth()->id())->latest()->get();
        return view('achievements.index', compact('achievements'));
    }

    public function create()
    {
        return view('achievements.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'event_date' => 'nullable|date',
            'description' => 'nullable|string',
            'file' => 'nullable|file|mimes:pdf|max:10240',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
        ]);

        $filePath = null;
        if ($request->hasFile('file')) {
            $filePath = $request->file('file')->store('achievements/docs', 'public');
        }

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('achievements/images', 'public');
        }

        Achievement::create([
            'user_id' => auth()->id(),
            'title' => $request->title,
            'description' => $request->description,
            'event_date' => $request->event_date,
            'file_path' => $filePath,
            'image_path' => $imagePath,
        ]);

        return redirect()->route('achievements.index')->with('success', 'Achievement added successfully!');
    }
    public function edit(Achievement $achievement)
    {
        if ($achievement->user_id !== auth()->id()) {
            abort(403);
        }
        return view('achievements.edit', compact('achievement'));
    }

    public function update(Request $request, Achievement $achievement)
    {
        if ($achievement->user_id !== auth()->id()) {
            abort(403);
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'event_date' => 'nullable|date',
            'description' => 'nullable|string',
            'file' => 'nullable|file|mimes:pdf|max:10240',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
        ]);

        if ($request->hasFile('file')) {
            $achievement->file_path = $request->file('file')->store('achievements/docs', 'public');
        }

        if ($request->hasFile('image')) {
            $achievement->image_path = $request->file('image')->store('achievements/images', 'public');
        }

        $achievement->update([
            'title' => $request->title,
            'description' => $request->description,
            'event_date' => $request->event_date,
            'file_path' => $achievement->file_path,
            'image_path' => $achievement->image_path,
        ]);

        return redirect()->route('achievements.index')->with('success', 'Achievement updated successfully!');
    }

    public function destroy(Achievement $achievement)
    {
        if ($achievement->user_id !== auth()->id()) {
            abort(403);
        }

        $achievement->delete();
        return redirect()->route('achievements.index')->with('success', 'Achievement deleted successfully!');
    }
}
