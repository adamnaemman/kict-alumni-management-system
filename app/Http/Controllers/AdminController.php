<?php

namespace App\Http\Controllers;

use App\Models\UpdateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        $requests = UpdateRequest::with('user')->where('status', 'pending')->get();
        return view('admin.approvals', compact('requests'));
    }

    public function show($id)
    {
        $updateRequest = UpdateRequest::with('user')->findOrFail($id);
        return view('admin.show', compact('updateRequest'));
    }

    public function approveRequest($id)
    {
        $request = UpdateRequest::with('user')->findOrFail($id);

        if ($request->status !== 'pending') {
            return back()->with('error', 'Request is not pending.');
        }

        DB::transaction(function () use ($request) {
            // Update request status
            $request->update(['status' => 'approved']);

            // Apply all profile data fields to user
            $profileData = $request->profile_data;
            if ($profileData) {
                $user = $request->user;
                $user->name = $profileData['name'] ?? $user->name;
                $user->email = $profileData['email'] ?? $user->email;
                $user->student_id = $profileData['student_id'] ?? $user->student_id;
                $user->graduation_year = $profileData['graduation_year'] ?? $user->graduation_year;
                $user->program = $profileData['program'] ?? $user->program;
                $user->current_position = $profileData['current_position'] ?? $user->current_position;
                $user->current_company = $profileData['current_company'] ?? $user->current_company;
                $user->phone_number = $profileData['phone_number'] ?? $user->phone_number;
                $user->linkedin_url = $profileData['linkedin_url'] ?? $user->linkedin_url;
                $user->bio = $profileData['bio'] ?? $user->bio;
                $user->save();
            } else {
                // Fallback for old requests without profile_data
                $request->user->update(['name' => $request->new_full_name]);
            }
        });

        return redirect()->route('admin.approvals')->with('success', 'Request approved and user profile updated.');
    }

    public function rejectRequest(Request $request, $id)
    {
        $updateRequest = UpdateRequest::findOrFail($id);

        $request->validate([
            'rejection_reason' => 'nullable|string'
        ]);

        $updateRequest->update([
            'status' => 'rejected',
            'rejection_reason' => $request->rejection_reason
        ]);

        return redirect()->route('admin.approvals')->with('success', 'Request rejected.');
    }
}
