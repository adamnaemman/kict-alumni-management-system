<?php

namespace App\Http\Controllers;

use App\Models\UpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    /**
     * Display all alumni list for admin
     */
    public function alumniList(Request $request)
    {
        $query = User::where('role', '=', 'alumni');

        // Apply Search
        if ($request->has('search') && !empty($request->search)) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%')
                    ->orWhere('student_id', 'like', '%' . $search . '%');
            });
        }

        // Apply Program Filter
        if ($request->has('program_filter') && !empty($request->program_filter)) {
            $query->where('program', '=', $request->program_filter);
        }

        // Apply State Filter
        if ($request->has('state_filter') && !empty($request->state_filter)) {
            $query->where('state', '=', $request->state_filter);
        }

        // Apply Sorting
        $sort = $request->get('sort', 'name_asc');
        if ($sort === 'name_asc') {
            $query->orderBy('name', 'asc');
        } elseif ($sort === 'name_desc') {
            $query->orderBy('name', 'desc');
        } else {
            $query->orderBy('name', 'asc');
        }

        $alumni = $query->get();
        $totalAlumni = User::where('role', '=', 'alumni')->count();

        return view('admin.alumni-list', compact('alumni', 'totalAlumni'));
    }

    /**
     * Show individual alumni details
     */
    public function showAlumni($id)
    {
        $alumnus = User::findOrFail($id);
        $achievements = \App\Models\Achievement::where('user_id', '=', $id)->latest()->get();
        return view('admin.alumni-show', compact('alumnus', 'achievements'));
    }


    /**
     * Generate report filtered by state - downloads as PDF
     */
    public function generateReport(Request $request)
    {
        $state = $request->input('state');

        $query = User::where('role', '=', 'alumni');

        if ($state) {
            $query->where('state', '=', $state);
        }

        $alumni = $query->orderBy('name')->get();

        // Generate PDF
        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('admin.alumni-report-pdf', compact('alumni'));

        $filename = 'alumni-report';
        if ($state) {
            $filename .= '-' . strtolower(str_replace(' ', '-', $state));
        }
        $filename .= '-' . now()->format('Y-m-d') . '.pdf';

        return $pdf->download($filename);
    }

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
                $user->gender = $profileData['gender'] ?? $user->gender;
                $user->birthdate = $profileData['birthdate'] ?? $user->birthdate;
                $user->address = $profileData['address'] ?? $user->address;
                $user->postcode = $profileData['postcode'] ?? $user->postcode;
                $user->state = $profileData['state'] ?? $user->state;
                $user->race = $profileData['race'] ?? $user->race;
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
