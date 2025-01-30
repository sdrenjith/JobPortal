<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    /**
     * Show the form to complete the user's profile.
     */
    public function complete()
    {
        $pdfPages = [
            // Page 1: Photo
            [
                'photo' => 'Choose Photo',
            ],
            // Page 2: Personal Information
            [
                'age' => 'Age',
                'gender' => 'Gender',
                'marital_status' => 'Marital Status',
                'work_experience' => 'Total Work Experience',
                'children' => 'Children',
                'nationality' => 'Nationality',
                'current_country' => 'Current Country',
                'religion' => 'Religion'
            ],
            // Page 3: Basic Info
            [
                'qualification_education' => 'Qualification',
                'whatsapp' => 'WhatsApp Number',
                'botim' => 'Botim Number',
                'telegram' => 'Telegram Number',
                'passport' => 'Passport',
                'languages' => 'Language Skills'
            ],
            // Page 4: Professional Information
            [
                'position' => 'Position',
                'job_type' => 'Job Type',
                'start_date' => 'Start Date',
                'work_status' => 'Current Work Status',
                'visa_type' => 'Visa Type'
            ],
            // Page 5: Job Preferences Information
            [
                'preferred_location' => 'Preferred Job Location',
                'expected_salary' => 'Expected Monthly Salary',
                'accommodation_preference' => 'Accommodation Preference',
                'day_off_preference' => 'Day Off Preference'
            ],
            // Page 6: Skills Information
            [
                'main_skill' => 'Main Skilled',
                'cooking_skills' => 'Cooking Skills',
                'other_skills' => 'Other Skills',
                'personality' => 'Personality'
            ],
            // Page 7: Previous Experience
            [
                'previous_job_position' => 'Select your Job Position',
                'previous_worked_country' => 'Select the country where you have worked before',
                'job_start_year' => 'Select work starting year',
                'job_start_month' => 'Select work starting month',
                'job_end_year' => 'Select contract finish year',
                'job_end_month' => 'Select contract finish month',
                'previous_employer_type' => 'What type of employer did you work for previously?',
                'previous_employer_nationality' => 'What was your previous employer\'s nationality?',
                'sponsor_house_people' => 'How many people were in your sponsor\'s house?',
                'job_in_employers_house' => 'What was your job in your employer\'s house?',
                'reference_letter' => 'Do you have a reference letter from your previous employer?'
            ],
            // Page 8: Education and Resume
            [
                'education' => 'Education',
                'duration_of_education' => 'Duration of Education',
                'completed_cource' => 'Did you complete this course?',
                'completion_year_of_cource' => 'What was the completion year of your course?',
                'resume_description' => 'Resume Description (Explain your work experience and personality)'
            ],
        ];
    
        $totalPages = count($pdfPages);
    
        return view('profile.complete', [
            'pdfPages' => $pdfPages, // Pass all pages to the view
            'totalPages' => $totalPages,
        ]);
    }

public function update(Request $request)
{

    // dd($request->all(), $request->file('photo'));

    // Fetch the authenticated user's data
    $user = auth()->user();

    // Dynamically build validation rules for all fields
    $validationRules = [];
    foreach ($user->getFillable() as $field) {
        if (!in_array($field, ['email', 'phone', 'password', 'role', 'first_name', 'last_name', 'botim', 'telegram'])) {
            switch ($field) {
                case 'photo':
                    $validationRules[$field] = 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048';
                    break;
                
                case 'date_of_birth':
                case 'start_date':
                    $validationRules[$field] = 'required|date';
                    break;
                case 'gender':
                case 'marital_status':
                case 'religion':
                case 'education':
                case 'work_status':
                case 'job_type':
                case 'position':
                case 'previous_employer_type':
                case 'previous_employer_nationality':
                    $validationRules[$field] = 'required|string';
                    break;
                case 'age':
                case 'work_experience':
                case 'children':
                case 'sponsor_house_people':
                    $validationRules[$field] = 'required|integer|min:0'; // Allow 0
                    break;
                case 'job_start_year':
                case 'job_end_year':
                    $validationRules[$field] = 'required|integer';
                    break;
                case 'job_start_month':
                case 'job_end_month':
                case 'expected_salary':
                    $validationRules[$field] = 'required|numeric';
                    break;
                case 'expected_salary_currency':
                    $validationRules[$field] = 'required|string|size:3';
                    break;
                case 'language':
                case 'main_skill':
                case 'cooking_skills':
                case 'other_skills':
                case 'personality':
                case 'duration_of_education':
                case 'day_off_preference':
                case 'accommodation_preference':
                case 'previous_job_position':
                case 'previous_worked_country':
                case 'job_in_employers_house':
                    $validationRules[$field] = 'required|array';
                    break;
                default:
                    $validationRules[$field] = 'required';
                    break;
            }
        }
    }

    // Validate the request
    $validator = Validator::make($request->all(), $validationRules);

    if ($validator->fails()) {
        return response()->json(['errors' => $validator->errors()], 422);
    }

    // Exclude non-database fields like '_token' from the request data
    $data = $request->except(['_token']);

    // Update the user's profile with the submitted data
    foreach ($data as $field => $value) {
        if ($field === 'photo' && $request->hasFile('photo')) {
            // Handle photo upload
            if ($request->file('photo')->isValid()) {
                if ($user->photo) {
                    Storage::delete($user->photo); // Delete the old photo
                }
                $path = $request->file('photo')->store('photos', 'public');
                $user->$field = $path;
            }
        } else {
            $user->$field = $value;
        }
    }

    // Save the user
    $user->save();

    // Redirect to the complete profile page
    // return redirect()->route('profile.complete')->with('success', 'Profile updated successfully!');
}
        



/**
     * Show the form to edit the user's profile.
     */
    public function edit(User $user)
    {
        return view('theme.account-settings', compact('user'));
    }

    /**
     * Update the user's profile in the account settings.
     */
    public function modify(Request $request, User $user)
    {
        // Exclude password from the update
        $data = $request->except('password');

        // Handle photo upload
        if ($request->hasFile('photo')) {
            if ($user->photo) {
                Storage::delete($user->photo); // Delete the old photo
            }
            $data['photo'] = $request->file('photo')->store('photos', 'public');
        }

        // Handle resume upload
        if ($request->hasFile('resume')) {
            if ($user->resume) {
                Storage::delete($user->resume); // Delete the old resume
            }
            $data['resume'] = $request->file('resume')->store('resumes', 'public');
        }

        // Update the user's data
        $user->update($data);

        // Redirect with a success message
        return redirect()->route('account-profile.user')->with('success', 'Profile updated successfully.');
    }
}