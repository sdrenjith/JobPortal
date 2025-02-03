<!DOCTYPE html>
<html lang="en">
<head>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complete Profile</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
          .btn-group-toggle input[type="checkbox"],
          .btn-group-toggle input[type="radio"] {
        display: none;
        
    }

    /* Style for the active state of the button */
    .btn-group-toggle .btn.active {
        background-color: #007bff; 
        color: #fff; 
    }
    .btn-outline-primary.active {
    background-color: #007bff; /* Change to your desired background color */
    color: #fff; /* Change to your desired text color */
    border-color: #007bff; /* Change to your desired border color */
}
.btn-outline-primary.active {
    background-color: #007bff; /* Change to your desired background color */
    color: #fff; /* Change to your desired text color */
    border-color: #007bff; /* Change to your desired border color */
}
        .form-page {
            display: none;
        }
        .form-page.active {
            display: block;
        }
        .required::after {
            content: " *";
            color: red;
        }

        /* Double the height of input fields */
        .form-control {
            height: calc(1.1 * var(--bs-form-control-height, 3rem));
            padding: 0.75rem 1rem;
        }
        .form-control.select {
            height: calc(1.1 * var(--bs-form-control-height, 3rem));
        }
        textarea.form-control {
            height: calc(2 * var(--bs-form-control-height, 4rem));
            resize: vertical;
        }
        .skill-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(120px, 1fr));
    gap: 10px;
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 5px;
}

.form-check-input {
    margin-right: 5px;
}
    </style>
    </head>
<body>
    <div class="container mt-5">

        @if(isset($message))
            <!-- Keep existing success message -->
        @else
            <form id="profile-form" action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data" novalidate>
                @csrf
                
               


                <!-- Page 1: Personal Information -->
                <div class="form-page" data-page="0">
                <h2 class="mb-4">Personal Details</h2>

                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label required">Select your Age / اختر عمرك</label>
                                <select class="form-select" name="age" required>
                                    @for($i=18; $i<=50; $i++)
                                        <option value="{{ $i }}">{{ $i }}</option>
                                    @endfor
                                </select> 
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label required">Select your Gender / اختر جنسك</label>
                                <select class="form-select" name="gender" required>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>
                        </div>
                    </div>



                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label required">Select Marital Status / اختر الحالة الاجتماعية</label>
                                <select class="form-select" name="marital_status" required>
                                <option value="">Select Marital Status</option>
                                    <option value="single">Single</option>
                                    <option value="married">Married</option>
                                    <option value="divorced">Divorced</option>
                                    <option value="widowed">Widowed</option>
                                    <option value="separated">Separated</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label required">What is your total work experience? / ما هي الخبرة العملية الكلية ?</label>
                                <select name="work_experience" id="work_experience" class="form-control" required>
                                    @for($i = 1; $i <= 15; $i++)
                                        <option value="{{ $i }}">{{ $i }}</option>
                                    @endfor
                                    <option value="above">Above 15</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label required">How many children do you have? / كم عدد الاطفال?</label>
                                <select name="children" id="children" class="form-control" required>
                                    @for($i = 0; $i <= 5; $i++)
                                        <option value="{{ $i }}">{{ $i }}</option>
                                    @endfor
                                    <option value="above">Above 5</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label required">What is your Nationality? / ما هي الجنسية ?</label>
                                <input type="text" class="form-control" id="nationality" name="nationality" placeholder="Nationality" required>
                            </div>
                        </div>
                    </div>



                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label required">Where do you live now (current country)? / ما هي الدولة الحالية ?</label>
                                <input type="text" class="form-control" id="current_country" name="current_country" placeholder="Current Country" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label required">What is your Religion? / ما هي الدين الخاص بك ?</label>
                                <select name="religion" id="religion" class="form-control" required>
                                    <option value="">Select Religion</option>
                                    <option value="islam">Islam</option>
                                    <option value="christianity">Christianity</option>
                                    <option value="hinduism">Hinduism</option>
                                    <option value="buddhism">Buddhism</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>
                        </div>
                    </div>





                </div>

                <!-- Page 2: Basic Info -->
                <div class="form-page" data-page="1">
                <h2 class="mb-4">Details About Yourself / تفاصيل عنك</h2>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label required">What is your Qualification? / ما هي التعليم الخاص بك ?</label>
                                <select name="qualification_education" id="qualification_education" class="form-control" required>
                                    <option value="">Select Qualification</option>
                                    <option value="high_school">High School</option>
                                    <option value="diploma">Diploma</option>
                                    <option value="bachelors">Bachelor's Degree</option>
                                    <option value="masters">Master's Degree</option>
                                    <option value="doctorate">Doctorate</option>
                                    <option value="other">Other</option>
                                </select>    
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label required">WhatsApp Number / رقم الواتساب</label>
                                <input type="text" class="form-control" id="whatsapp" name="whatsapp" placeholder="WhatsApp" required>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label ">Botim Number / رقم البوتيم</label>
                                <input type="text" class="form-control" id="botim" name="botim" placeholder="Botim">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label ">Telegram Number / رقم التيلي</label>
                                <input type="text" class="form-control" id="telegram" name="telegram" placeholder="Telegram">
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label required">Do you have a valid Passport? / هل لديك جواز سفر صالح?</label>
                                <select name="passport" id="passport" class="form-control" required>
                                <option value="">Select Option</option>
                                <option value="yes">Yes</option>
                                <option value="applied">Applied</option>
                                <option value="not_yet">Not Yet</option>

                            </select>
                            </div>
                        </div>
                
                    </div>






            </div>

    <!-- Page 3: Job Preferences -->
    <div class="form-page" data-page="2">
        <h2 class="mb-4">Professional Information / المعلومات الشخصية</h2>
        
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="position" class="form-label required">For which position do you want to apply? / لماذا تريد التقديم؟</label>
                    <select name="position" id="position" class="form-control" required>
                        <option value="">Select Option</option>
                        <option value="domestic_helper">Domestic Helper</option>
                        <option value="house_cook">House Cook</option>
                        <option value="other">Other</option>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="job_type" class="form-label required">Job Type / نوع الوظيفة</label>
                    <select name="job_type" id="job_type" class="form-control" required>
                        <option value="">Select Option</option>
                        <option value="full_time">Full Time</option>
                        <option value="part_time">Part Time</option>
                        <option value="temporary">Temporary</option>
                    </select>
                    <p style="color:red; font-size:13px;">Follow labor laws. Part-time jobs are for permanent residents only.</p>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="start_date" class="form-label required">When would you like to start your job? / ما ستبدأ الوظيفة؟?</label>
                    <input type="date" class="form-control" id="start_date" name="start_date" 
                        min="{{ \Carbon\Carbon::tomorrow()->toDateString() }}" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="visa_type" class="form-label required">Which visa do you have? / ما هو الجواز الذي لديك؟?</label>
                    <select name="visa_type" id="visa_type" class="form-control" required>
                        <option value="">Select Option</option>
                        <option value="visit_visa">Visit Visa</option>
                        <option value="employment_visa">Employment Visa</option>
                        <option value="no_visa">No Visa</option>
                    </select>
                </div>
            </div>
        </div>
        
        <div class="row">
            

            <div class="row">
            <div class="mb-3">
                <label class="form-label required">Current Work Status / حالة العمل</label>
                <div class="d-flex flex-wrap gap-2">
                    @foreach([
                        'finish_contract', 'terminated_relocation', 'terminated_other', 'break_contract', 
                        'transfer', 'working_in_home_country', 'unemployed', 'ex_oversea'
                    ] as $status)
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="work_status" value="{{ $status }}" id="work_status_{{ $status }}" required>
                            <label class="form-check-label" for="work_status_{{ $status }}">{{ ucfirst(str_replace('_', ' ', $status)) }}</label>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        </div>
                        </div>
                        <div class="form-page" data-page="3">
        <h2 class="mb-4">Job Preferences Information / المعلومات الشخصية</h2>
        
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="preferred_location" class="form-label required">Preferred Job Location / المكان المفضل للوظيفة</label>
                    <input type="text" class="form-control" id="preferred_location" name="preferred_location" placeholder="Preferred Job Location" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="expected_salary" class="form-label required">Expected Monthly Salary / الراتب الشهري المتوقع</label>
                    <div class="input-group">
                        <select name="expected_salary_currency" id="expected_salary_currency" class="form-select" 
                                style="width: auto; border-radius: 0.25rem 0 0 0.25rem;">
                            <option value="USD">USD</option>
                            <option value="EUR">EUR</option>
                            <option value="AED">AED</option>
                            <option value="INR">INR</option>
                        </select>
                        <input type="number" class="form-control" id="expected_salary" name="expected_salary" required 
                            style="border-radius: 0 0.25rem 0.25rem 0;">
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="mb-3">
            <label class="form-label required">Accommodation Preference / المقام المفضل</label>
                <div class="btn-group-toggle" data-toggle="buttons">
                    @foreach([
                            'Live In', 'Live Out', 'Sharing Room', 'Separate Room', 'Flexible', 'To be Discussed'
                        ] as $accommodation)
                        <label class="btn btn-outline-primary mb-2 mr-2" for="accommodation_{{ $accommodation }}">
                            <input type="checkbox" name="accommodation_preference[]" 
                                value="{{ $accommodation }}" id="accommodation_{{ $accommodation }}" autocomplete="off">
                            {{ $accommodation }}
                        </label>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="row">
            <div class="mb-3">
                <label class="form-label required">Day Off Preference / الأيام المفضلة</label>
                <div class="btn-group-toggle" data-toggle="buttons">
                    @foreach([
                            'Weekly', 'Friday-Saturday', 'Saturday-Sunday', 'Flexible', 'I Don’t Want', 'To be Discussed'
                        ] as $day_off_preference)
                        <label class="btn btn-outline-primary mb-2 mr-2" for="day_off_{{ $day_off_preference }}">
                            <input type="checkbox" name="day_off_preference[]" 
                                value="{{ $day_off_preference }}" id="day_off_{{ $day_off_preference }}" autocomplete="off">
                            {{ $day_off_preference }}
                        </label>
                    @endforeach
                </div>
            </div>
        </div>
    </div>



                    <div class="form-page" data-page="4">
                    <h2 class="mb-4">Skills / المهارات</h2>
                    
                    <div class="row">
                    <div class="mb-3">
                    <label class="form-label required">Language Skills / مهارات اللغات</label>
                    <div class="btn-group-toggle" data-toggle="buttons">
                    @foreach([
                        'English', 'Arabic', 'Nepali', 'Srilankan', 'Thai', 'Macanese', 'India', 'Japanese', 
                        'Russian', 'Bangali', 'Cantonese', 'Vietnamese', 'Mandarin', 'Combodian', 'Iranian', 
                        'Korean', 'Indonesia (Bahasa)', 'Filipino (Tagalog)', 'Other' 
                    ] as $lang)
                        <label class="btn btn-outline-primary mb-2 mr-2" for="lang_{{ $lang }}">
                            <input type="checkbox" name="language[]" value="{{ $lang }}" id="lang_{{ $lang }}" autocomplete="off">
                            {{ $lang }}
                        </label>
                    @endforeach
                </div>
                </div>
                </div>

                <div class="row">
                    <div class="mb-3">
                    <label class="form-label required">English Language / مهارات اللغات</label>
                    <div class="btn-group-toggle" data-toggle="buttons">
                    @foreach([
                        'Fluent', 'Fair', 'Poor', 'Very Poor', 'Read', 'Write', 'No Read', 'No Write', 
                       
                    ] as $englang)
                        <label class="btn btn-outline-primary mb-2 mr-2" for="englang_{{ $englang }}">
                            <input type="checkbox" name="english_level" value="{{ $englang }}" id="englang_{{ $englang }}" autocomplete="off">
                            {{ $englang }}
                        </label>
                    @endforeach
                </div>
                </div>
                </div>

                <div class="row">
                    <div class="mb-3">
                    <label class="form-label required">Arabic Language / مهارات اللغات</label>
                    <div class="btn-group-toggle" data-toggle="buttons">
                    @foreach([
                        'Fluent', 'Fair', 'Poor', 'Very Poor', 'Read', 'Write', 'No Read', 'No Write', 
                       
                    ] as $arablang)
                        <label class="btn btn-outline-primary mb-2 mr-2" for="arablang_{{ $arablang }}">
                            <input type="checkbox" name="arabic_level" value="{{ $arablang }}" id="arablang_{{ $arablang }}" autocomplete="off">
                            {{ $arablang }}
                        </label>
                    @endforeach
                </div>
                </div>
                </div>

<div class="row">
    <div class="col-md-4">
        <div class="mb-3">
            <label for="height" class="form-label required">Height / الارتفاع</label>
            <input type="number" class="form-control" id="height" name="height" placeholder="Enter height in cm" required>
        </div>
    </div>
    <div class="col-md-4">
        <div class="mb-3">
            <label for="weight" class="form-label required">Weight / الوزن</label>
            <input type="number" class="form-control" id="weight" name="weight" placeholder="Enter weight in kg" required>
        </div>
    </div>
</div>

<div class="row">
                    <div class="mb-3">
                    <label class="form-label required">Color / اللون</label>
                                    <div class="d-flex flex-wrap gap-2">
                    @foreach([
                        'Very Fair', 'Fair', 'Medium', 'Dark',
                    ] as $color)
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="color" value="{{ $color }}" id="color_{{ $color }}" required>
                            <label class="form-check-label" for="color_{{ $color }}">{{ $color }}</label>
                        </div>
                    @endforeach
                </div>
                </div>
                </div>

                    </div> <div class="form-page" data-page="5">
                    <h2 class="mb-4">Skills / المهارات</h2>
        <div class="row">
            <div class="mb-3">
                <label class="form-label required">Main Skills / المهارات الرئيسية</label>
                <div class="btn-group-toggle" data-toggle="buttons">
                    @foreach([
                        'Baby care', 'Child care', 'Teen care', 'Elderly care', 'Pets care', 'Tutoring', 'Housekeeping', 'Cooking', 'Marketing', 'Groceries'
                    ] as $main_skill)
                        <label class="btn btn-outline-primary mb-2 mr-2" for="skill_{{ str_replace(' ', '_', strtolower($main_skill)) }}">
                            <input type="checkbox" name="main_skill[]" value="{{ $main_skill }}" id="skill_{{ str_replace(' ', '_', strtolower($main_skill)) }}" autocomplete="off">
                            {{ $main_skill }}
                        </label>
                    @endforeach
                </div>
              
            </div>
        </div>
        <div class="row">
            <div class="mb-3">
                <label class="form-label required">Cooking Skills / المهارات الطبخ</label>
               
                <div class="btn-group-toggle" data-toggle="buttons">
                    @foreach([
                        'Arabic', 'Indian', 'Italian', 'Japanese', 'Chinese', 'Thai', 'Singaporean', 'Vegetarian', 'Western', 'French', 'Mexican', 'Turkish', 'Moroccan', 'Brazilian', 'Lebanese', 'Spanish', 'Greek', 'American'
                    ] as $cooking_skill)
                        <label class="btn btn-outline-primary mb-2 mr-2" for="cooking_skill_{{ $cooking_skill }}">
                            <input type="checkbox" name="cooking_skills[]" value="{{ $cooking_skill }}" id="cooking_skill_{{ $cooking_skill }}" autocomplete="off">
                            {{ $cooking_skill }}
                        </label>
                    @endforeach
                </div>
            </div>
        </div>
    <div class="row">
        <div class="mb-3">
            <label class="form-label required">Other Skills / المهارات الأخرى</label>
            <div class="btn-group-toggle" data-toggle="buttons">
                @foreach([
                    'baking', 'caregiver', 'car_wash', 'computer', 'driving_license', 'first_aid', 'gardening', 'handyman', 'housework', 'sewing', 'swimming', 'cleaning', 'laundry'
                ] as $other_skill)
                    <label class="btn btn-outline-primary mb-2 mr-2" for="other_skill_{{ $other_skill }}">
                        <input type="checkbox" name="other_skills[]" value="{{ $other_skill }}" id="other_skill_{{ $other_skill }}" autocomplete="off">
                        {{ $other_skill }}
                    </label>
                @endforeach
            </div>
        </div>
    </div>
        <div class="row">
            <div class="mb-3">
                <label class="form-label required">Personality / الشخصية</label>
                <div class="btn-group-toggle" data-toggle="buttons">
                    @foreach([
                        'Hard working', 'Good listener', 'Pet lover', 'Independent', 'Honest', 'Kids lover', 'Love cooking', 'Loyal', 'Patience', 'Trust worthy', 'Strong', 'Willing to Learn', 'Work without supervisor'
                    ] as $personality)
                        <label class="btn btn-outline-primary mb-2 mr-2" for="personality_{{ $personality }}">
                            <input type="checkbox" name="personality[]" value="{{ $personality }}" id="personality_{{ $personality }}" autocomplete="off">
                            {{ $personality }}
                        </label>
                    @endforeach
                </div>
            </div>
        </div>
                        </div>
                        
                        <div class="form-page" data-page="6">
    <h2 class="mb-4">Previous Experience / تجربة سابقة</h2>
    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label for="job_start_year" class="form-label">Select work starting year / تحديد سنة بدء العمل</label>
                <div class="d-flex">
                    <input type="number" name="job_start_year" id="job_start_year" class="form-control me-2" required placeholder="e.g., 2020">
                    <select name="job_start_month" id="job_start_month" class="form-control" required>
                        <option value="">Month</option>
                        <option value="1">January</option>
                        <option value="2">February</option>
                        <option value="3">March</option>
                        <option value="4">April</option>
                        <option value="5">May</option>
                        <option value="6">June</option>
                        <option value="7">July</option>
                        <option value="8">August</option>
                        <option value="9">September</option>
                        <option value="10">October</option>
                        <option value="11">November</option>
                        <option value="12">December</option>
                    </select>
                </div>
            </div>
        </div>
                    
        <div class="col-md-6">
            <div class="mb-3">
                <label for="job_end_year" class="form-label">Select contract finish year / تحديد سنة انتهاء العقد</label>
                <div class="d-flex">
                    <input type="number" name="job_end_year" id="job_end_year" class="form-control me-2" required placeholder="e.g., 2023">
                    <select name="job_end_month" id="job_end_month" class="form-control" required>
                        <option value="">Month</option>
                        <option value="1">January</option>
                        <option value="2">February</option>
                        <option value="3">March</option>
                        <option value="4">April</option>
                        <option value="5">May</option>
                        <option value="6">June</option>
                        <option value="7">July</option>
                        <option value="8">August</option>
                        <option value="9">September</option>
                        <option value="10">October</option>
                        <option value="11">November</option>
                        <option value="12">December</option>
                    </select>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label for="previous_employer_type" class="form-label">What type of employer did you work for previously? / ما نوع الوظيفة السابقة?</label>
                <select name="previous_employer_type" id="previous_employer_type" class="form-control" required>
                    <option value="">Select Employer Type</option>
                    <option value="family">Family</option>
                    <option value="company">Company</option>
                    <option value="other">Other</option>
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label for="previous_employer_nationality" class="form-label">What was your previous employer's nationality? / ما كان نوع الوظيفة السابقة؟ ?</label>
                <input type="text" name="previous_employer_nationality" id="previous_employer_nationality" class="form-control" required placeholder="Type or select a nationality">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label for="sponsor_house_people" class="form-label">How many people were in your sponsor's house? / كم عدد الأشخاص الذين كانوا في منزلك?</label>
                <input type="number" name="sponsor_house_people" id="sponsor_house_people" class="form-control" required>
            </div>
        </div>
        
   
        <div class="col-md-6">
            <div class="mb-3">
                <label for="reference_letter" class="form-label">Do you have a reference letter from your previous employer? / هل لديك رسالة من وظيفة سابقة?</label>
                <select name="reference_letter" id="reference_letter" class="form-control" required>
                    <option value="">Select Employer Type</option>
                    <option value="yes">Yes</option>
                    <option value="no">No</option>
                </select>
            </div>
        </div>
    </div>

        <div class="row">
            <div class="mb-3">
                <label class="form-label required">Previous Job Position / وظيفة سابقة</label>
                <div class="btn-group-toggle" data-toggle="buttons">
                    @foreach([
                            'cook', 'caregiver', 'driver', 'nurse', 'teacher', 'nany', 'babysitter', 'gardener', 
                            'houseboy', 'domestic_helper', 'security_guard', 'cleaner', 'housekeeper', 'handy_boy', 
                            'butler', 'laundry_worker', 'beautician', 'tailor', 'maid', 'hair_dresser', 'secretary', 
                            'gym_trainer', 'swimming_trainer', 'elder_care' ] as $pos)
                        <label class="btn btn-outline-primary mb-2 mr-2" for="pos_{{ $pos }}">
                            <input type="checkbox" name="previous_job_position[]" 
                                value="{{ $pos }}" id="pos_{{ $pos }}" autocomplete="off">
                            {{ ucfirst($pos) }}
                        </label>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="row">
            <div class="mb-3">
                <label class="form-label required">Select the country where you have worked before / اختر الدولة التي قمت بالعمل فيها</label>
                <div class="btn-group-toggle" data-toggle="buttons">
                    @foreach([
                            'Qatar', 'Dubai', 'Oman', 'Saudi', 'Kuwait', 'Bahrain', 'United Arab Emirates (UAE)',
                            'Turkey', 'Malaysia', 'Taiwan', 'Singapore', 'South Korea', 'Hongkong', 'Russia', 
                            'Jordan', 'Israel', 'Italy', 'Spain', 'France', 'Germany', 'United Kingdom', 
                            'Ireland', 'Netherlands', 'Belgium', 'Austria', 'Cyprus', 'Other' ] as $country)
                        <label class="btn btn-outline-primary mb-2 mr-2" for="country_{{ $country }}">
                            <input type="checkbox" name="previous_worked_country[]" 
                                value="{{ $country }}" id="country_{{ $country }}" autocomplete="off">
                            {{ $country }}
                        </label>
                    @endforeach
                </div>
            </div>
        </div>
    <div class="row">
        <div class="mb-3">
            <label class="form-label required">What was your job in your employer's house? / ما هي وظيفتك في منزلك ?</label>
            <div class="btn-group-toggle" data-toggle="buttons">
                @foreach([
                        'cook', 'caregiver', 'driver', 'nurse', 'teacher', 'nany', 'babysitter', 'gardener', 
                        'houseboy', 'domestic_helper', 'security_guard', 'cleaner', 'housekeeper', 'handy_boy', 
                        'butler', 'laundry_worker', 'beautician', 'tailor', 'maid', 'hair_dresser', 'secretary', 
                        'gym_trainer', 'swimming_trainer', 'elder_care' ] as $job)
                    <label class="btn btn-outline-primary mb-2 mr-2" for="job_{{ $job }}">
                        <input type="checkbox" name="job_in_employers_house[]" 
                            value="{{ $job }}" id="job_{{ $job }}" autocomplete="off">
                        {{ ucfirst($job) }}
                    </label>
                @endforeach
            </div>
        </div>
    </div>


   
    </div>

    <div class="form-page" data-page="7">
    <h2 class="mb-4">Education / Qualification / التعليم / المؤهلات</h2>

<div class="row">
<div class="col-md-6">
            <div class="mb-3">
            <label for="education" class="form-label">What is your Education? / ما هي مستوى التعليم ?</label>
        <select name="education" id="education" class="form-control" required>
            <option value="">Select Qualification</option>
            <option value="below_10th">Below 10th</option>
            <option value="high_school">High School</option>
            <option value="12th">12th</option>
            <option value="bachelors">Bachelor</option>
            <option value="masters">Master</option>
            <option value="doctorate">Doctorate</option>
            <option value="other">University</option>
        </select>
            </div>
        </div>

                </div>

                <div class="row">

                <div class="col-md-6">
                <div class="mb-3">
    <label for="completed_cource" class="form-label">Did you complete this course? / هل قمت بالتعلم هذه الدورة ?</label>
    <select name="completed_cource" id="completed_cource" class="form-control" >
        <option value="">Select Employer Type</option>
        <option value="yes">Yes</option>
        <option value="pending">Pending</option>
        <option value="no">No</option>
    </select>
    </div>
                </div>

                <div class="col-md-6">
                <div class="mb-3">
    <label for="completion_year_of_cource" class="form-label">What was the completion year of your course? / ما هي سنة إنتهاء التعلم الخاص بك ?</label>
    <input type="number" name="completion_year_of_cource" id="completion_year_of_cource" class="form-control me-2" placeholder="e.g., 2023">

    </div>
</div></div>
<div class="row">
    <div class="mb-3">
        <label class="form-label required">What is the duration of your course? / مدة التعلم ?</label>
        <div class="btn-group-toggle" data-toggle="buttons">
            @foreach([
                '1 month', '2 months', '3 months', '4 months', '5 months', '6 months', 
                '1 Year', '2 Years', '3 Years', '4 Years', '5 Years'
            ] as $duration)
                <label class="btn btn-outline-primary mb-2 mr-2" for="duration_{{ $duration }}">
                    <input type="checkbox" name="duration_of_education[]" 
                        value="{{ $duration }}" id="duration_{{ $duration }}" autocomplete="off">
                    {{ $duration }}
                </label>
            @endforeach
        </div>
    </div>
</div>

<div class="row">

<h3 class="mb-4 mt-10">Resume Description (Explain your work experience and personality) / وصف السيرة الذاتية</h3>

<div class="mb-3">
<label for="resume_description" class="form-label">Resume Description (Explain your work experience and personality)</label>
        <textarea class="form-control" id="resume_description" name="resume_description" placeholder="Resume Description" required></textarea>
    </div>

</div>

                </div>
                <div class="form-page active" data-page="8">
    <div class="row">
        <h2 class="mb-6 justify-content-center"></h2>
    </div>
    <div class="row">
        <div class="col-lg-12 d-flex justify-content-center">
            <div style="width:100%;text-align:center">
                <br><br>
                <label class="form-label required" style="margin-bottom: 1.5rem;">Choose Photo</label>
                <br>
                <div class="position-relative">
                    <img src="assets/img/account/avatar.jpg" id="photo-preview" class="img-thumbnail mt-2" style="max-width: 400px; height: 400px; object-fit: cover;" />

                    
                </div>
                <br>
                <div class="photo-options mt-3">
                    <button type="button" class="btn btn-secondary" style="margin-top: 1.5rem;" onclick="document.getElementById('photo').click()">Upload Photo</button> &nbsp;
                    <button type="button" class="btn btn-secondary" style="margin-top: 1.5rem;" onclick="removePhoto()">Remove Photo</button>
                    <div style="display: flex; justify-content: center; align-items: center; margin-top: 1.5rem;">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="photo" id="profile_photo_yes" value="yes" checked>
                            <label class="form-check-label" for="profile_photo_yes">Show Profile Photo</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="photo" id="profile_photo_no" value="no">
                            <label class="form-check-label" for="profile_photo_no">Hide Profile Photo</label>
                        </div>
                    </div>
                    <p id="visible-profile-photos" style="display: none; color: green;">Visible profile photos get more responses</p>
                   
                </div>
            </div>
        </div>
        <div class="col-md-12">
    <input type="file" class="form-control" id="photo" name="photo" accept="image/*" required 
           style="position: absolute; opacity: 0; width: 1px; height: 1px;">
</div>

    </div>
    <script>
        document.getElementById('profile_photo_no').addEventListener('click', function() {
                            document.getElementById('visible-profile-photos').style.display = 'block';
                        });
                        document.getElementById('profile_photo_yes').addEventListener('click', function() {
                            document.getElementById('visible-profile-photos').style.display = 'none';
                        });

        document.getElementById('photo').addEventListener('change', function(event) {
            const file = event.target.files[0];
            const preview = document.getElementById('photo-preview');
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.classList.remove('d-none');
            }
            reader.readAsDataURL(file);
        });

        function removePhoto() {
            document.getElementById('photo-preview').src = 'assets/img/account/avatar.jpg';
            document.getElementById('photo-preview').classList.remove('d-none');
            document.getElementById('photo').value = '';
        }
    </script>
</div>


                <!-- Navigation Buttons -->
                <div class="d-flex justify-content-between mt-4">
                    <button type="button" class="btn btn-secondary" id="prev-page" style="display: none;"><< Back</button>
                    <span class="text-muted">1/{{ $totalPages }}</span>
                    <button type="button" class="btn btn-primary" id="next-page">Next >></button>
                    <button type="submit" class="btn btn-success" id="submit-form" style="display: none;">Submit</button>
                </div>
            </form>
        @endif
    </div>

    <script>
    $(document).ready(function () {
        const totalPages = {{ $totalPages }};
        let currentPage = 0;

        function updateNavigation() {
            // Hide all pages and show the current page
            $('.form-page').removeClass('active').hide();
            $(`.form-page[data-page="${currentPage}"]`).addClass('active').show();

            // Update navigation buttons and page counter
            $('#prev-page').toggle(currentPage > 0);
            $('#next-page').toggle(currentPage < totalPages - 1);
            $('#submit-form').toggle(currentPage === totalPages - 1);
            $('.text-muted').text(`${currentPage + 1}/${totalPages}`);
        }

        function validateCurrentPage() {
            let isValid = true;
            const currentPageFields = $(`.form-page[data-page="${currentPage}"]`).find('input, select, textarea');

            // Clear previous error messages
            $('.error-message').remove();

            // Validate each field on the current page
            currentPageFields.each(function () {
                const field = $(this);
                if (field.prop('required') && !field.val().trim()) {
                    isValid = false;
                    field.after(`<div class="error-message text-danger">This field is required.</div>`);
                }
            });

            return isValid;
        }

        $('#next-page').click(() => {
            if (validateCurrentPage() && currentPage < totalPages - 1) {
                currentPage++;
                updateNavigation();
            }
        });

        $('#prev-page').click(() => {
            if (currentPage > 0) {
                currentPage--;
                updateNavigation();
            }
        });

        $('#submit-form').click((e) => {
    e.preventDefault(); // Prevent default form submission

    if (validateCurrentPage()) {
        const form = $('#profile-form')[0]; // Get the form element
        const formData = new FormData(form); // Create FormData object

        // Append the file manually (in case it's needed)
        const photoFile = document.getElementById('photo').files[0];
        if (photoFile) {
            formData.append('photo', photoFile);
        }

        $.ajax({
            url: form.action,
            method: form.method,
            data: formData,
            processData: false,  // Important: Prevent jQuery from converting form data into a query string
            contentType: false,  // Important: Set content type to false for file uploads
            success: (response) => {
                alert('Form submitted successfully!');
                setTimeout(() => {
                    window.location.reload(); // Reload the page
                }, 2000);
            },
            error: (xhr) => {
                try {
                    const errorResponse = JSON.parse(xhr.responseText);
                    const errors = errorResponse.errors 
                        ? Object.values(errorResponse.errors).flat() 
                        : [errorResponse.message || 'An error occurred while submitting the form.'];

                    alert(`The following errors occurred:\n\n${errors.join('\n')}`);
                } catch (err) {
                    alert('An unexpected error occurred.');
                }
            }
        });
    }
});


        // Initialize navigation
        updateNavigation();
    });

    document.querySelectorAll('.btn-group-toggle input[type="checkbox"]').forEach(function(checkbox) {
    checkbox.addEventListener('change', function() {
        if (this.checked) {
            this.parentElement.classList.add('active');
        } else {
            this.parentElement.classList.remove('active');
        }
    });
});




</script>






</body>
</html>

