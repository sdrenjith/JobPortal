<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('theme.account-signup'); 
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'role' => 'required|in:user,company',
            'photo' => 'nullable|image|max:2048',
            'age' => 'required|numeric',
            'gender' => 'required|in:male,female,other',
            'marital_status' => 'required|in:single,married,widowed,divorced,separated',
            'work_experience' => 'required|string',
            'children' => 'required|string',
            'nationality' => 'required|string|max:255',
            'current_country' => 'required|string|max:255',
            'religion' => 'required|string',
            'qualification_education' => 'required|string',
            'phone' => 'required|string|max:20',
            'whatsapp' => 'nullable|string|max:20',
            'botim' => 'nullable|string|max:20',
            'telegram' => 'nullable|string|max:20',
            'passport' => 'required|in:yes,applied,not_yet',
            'position' => 'required|string',
            'job_type' => 'required|in:full_time,part_time,temporary',
            'start_date' => 'required|date',
            'work_status' => 'required|string',
            'visa_type' => 'nullable|string',
            'preferred_location' => 'required|string',
            'expected_salary_currency' => 'required|string',
            'expected_salary' => 'required|numeric',
            'day_off_preference' => 'required|string',
            'accommodation_preference' => 'required|string',
            'language' => 'required|string',
            'main_skill' => 'required|string',
            'cooking_skills' => 'required|string',
            'other_skills' => 'required|string',
            'personality' => 'required|string',
            'previous_job_position' => 'required|string',
            'previous_worked_country' => 'required|string',
            'job_start_year' => 'required|numeric',
            'job_start_month' => 'required|string',
            'job_end_year' => 'required|numeric',
            'job_end_month' => 'required|string',
            'previous_employer_type' => 'required|string',
            'previous_employer_nationality' => 'required|string',
            'sponsor_house_people' => 'required|numeric',
            'job_in_employers_house' => 'required|string',
            'reference_letter' => 'required|in:yes,no',
            'education' => 'required|string',
            'duration_of_education' => 'required|string',
            'completed_cource' => 'nullable|in:yes,no,pending',
            'completion_year_of_cource' => 'nullable|numeric',
            'resume_description' => 'required|string',
        ]);

        // Handle photo upload
        $photoPath = null;
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('profile_photos', 'public');
        }

        // Create the user
        $user = User::create(array_merge($validated, [
            'password' => Hash::make($validated['password']),
            'photo' => $photoPath,
        ]));

        auth()->login($user);

        // Redirect logic remains the same
        if ($validated['role'] === 'company') {
            return redirect()->route('filament.admin.pages.company-dashboard');
        } elseif ($validated['role'] === 'user') {
            return redirect()->route('filament.admin.pages.user-dashboard');
        }

        return redirect()->route('home');
    }
}
