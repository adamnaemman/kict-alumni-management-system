<?php

namespace App\Http\Controllers;

use App\Models\UpdateRequest;
use Illuminate\Http\Request;

class AlumniController extends Controller
{
    public function dashboard()
    {
        $user = auth()->user();
        $userId = auth()->id();
        $requests = UpdateRequest::where('user_id', $userId)->get();

        $stats = [
            'total' => $requests->count(),
            'approved' => $requests->where('status', 'approved')->count(),
            'pending' => $requests->where('status', 'pending')->count(),
            'feedback' => \App\Models\Feedback::where('user_id', $userId)->count(),
        ];

        $achievements = \App\Models\Achievement::where('user_id', $userId)->latest()->get();

        return view('alumni.dashboard', compact('user', 'requests', 'stats', 'achievements'));
    }

    public function submitRequest(Request $request)
    {
        $request->validate([
            'new_full_name' => 'required|string|max:255',
            'file' => 'required|file|mimes:pdf,jpg,jpeg,png|max:5120', // Max 5MB
        ]);

        $path = $request->file('file')->store('achievements'); // Stores in storage/app/achievements (needs symlink or local disk config)
        // By default store() puts in 'private' storage/app unless disk is specified. 
        // Plan says: "Store in storage/app/achievements".

        UpdateRequest::create([
            'user_id' => auth()->id(),
            'new_full_name' => $request->new_full_name,
            'file_path' => $path,
            'status' => 'pending',
        ]);

        return back()->with('success', 'Update request submitted successfully.');
    }
}
