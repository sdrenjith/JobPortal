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
    $user = auth()->user();
    $pdfPages = [
        // Page 1: Personal Information
        [
            'photo' => 'Choose Photo',
            'age' => 'Age',
            'gender' => 'Gender',
            'marital_status' => 'Marital Status',
            'work_experience' => 'Total Work Experience',
            'children' => 'Children',
            'nationality' => 'Nationality',
            'current_country' => 'Current Country',
            'religion' => 'Religion'
        ],
        // Page 2: Basic Info
        [
            'qualification_education' => 'Qualification',
            'whatsapp' => 'WhatsApp Number',
            'botim' => 'Botim Number',
            'telegram' => 'Telegram Number',
            'passport' => 'Passport',
            'languages' => 'Language Skills'
        ],
        // Page 3: Professional Information
        [
            'position' => 'Position',
            'job_type' => 'Job Type',
            'start_date' => 'Start Date',
            'work_status' => 'Current Work Status',
            'visa_type' => 'Visa Type'
        ],
        // Page 4: Job Preferences Information
        [
            'preferred_location' => 'Preferred Job Location',
            'expected_salary' => 'Expected Monthly Salary',
            'accommodation_preference' => 'Accommodation Preference',
            'day_off_preference' => 'Day Off Preference'
        ],
        // Page 5: Skills Information
        [
            'main_skill' => 'Main Skilled',
            'cooking_skills' => 'Cooking Skills',
            'other_skills' => 'Other Skills',
            'personality' => 'Personality'
        ],
        // Page 6: Previous Experience
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
        // Page 7: Education and Resume
        [
            'education' => 'Education',
            'duration_of_education' => 'Duration of Education',
            'completed_cource' => 'Did you complete this course?',
            'completion_year_of_cource' => 'What was the completion year of your course?',
            'resume_description' => 'Resume Description (Explain your work experience and personality)'
        ],
    ];

    // Filter out completed fields
    $missingFieldsChunks = [];
    foreach ($pdfPages as $page) {
        $missingPage = [];
        foreach ($page as $field => $label) {
            // Check if the field is null or an empty string
            $value = $user->$field;
            if (is_null($value) || $value === '') {
                $missingPage[$field] = $label;
            }
        }
        if (!empty($missingPage)) {
            $missingFieldsChunks[] = $missingPage;
        }
    }

    $totalPages = count($missingFieldsChunks);

    return view('profile.complete', [
        'missingFieldsChunks' => $missingFieldsChunks,
        'totalPages' => $totalPages,
        'requiredFields' => array_keys(array_merge(...$pdfPages))
    ]);
}
public function update(Request $request)
{
    // Fetch the authenticated user's data
    $user = auth()->user();

    // Get the missing fields from the session or request
    $missingFields = $request->session()->get('missingFields', []);

    // Dynamically build validation rules for missing fields
    $validationRules = [];
    foreach ($missingFields as $field => $label) {
        // Add validation rules based on the field name or type
        switch ($field) {
            case 'photo':
                $validationRules[$field] = 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048';
                break;
            case 'resume':
                $validationRules[$field] = 'nullable|file|mimes:pdf,doc,docx|max:5120';
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
            case 'phone':
            case 'whatsapp':
                $validationRules[$field] = 'required|string|min:10|max:15';
                break;
            case 'email':
                $validationRules[$field] = 'required|email';
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

    // Validate the request
    $validatedData = $request->validate($validationRules);

    // Update the user's profile with the submitted data
    foreach ($validatedData as $field => $value) {
        if ($field === 'photo' && $request->hasFile('photo')) {
            // Handle photo upload
            $path = $request->file('photo')->store('photos', 'public');
            $user->$field = $path;
        } elseif ($field === 'resume' && $request->hasFile('resume')) {
            // Handle resume upload
            $path = $request->file('resume')->store('resumes', 'public');
            $user->$field = $path;
        } else {
            $user->$field = $value;
        }
    }

    // Save the user
    $user->save();

    // Return a JSON response
    return response()->json(['success' => 'Profile updated successfully!'])->withHeaders([
        'Refresh' => '0;url=' . route('account-profile.user'),
    ]);
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