<!DOCTYPE html>
<html lang="en">
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
                                <label class="form-label required">What is your Name ? / ما هو الاسم الخاص بك ?</label>
                                <input type="text" class="form-control" name="first_name" placeholder="First Name" required>
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label ">&nbsp;</label>
                                <input type="text" class="form-control" name="last_name" placeholder="Last Name" required>
                            </div>
                        </div>
                    </div>
             
           

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
                                <div class="btn-group-toggle" data-toggle="buttons">
                                    @foreach(['male', 'female', 'other'] as $gender)
                                        <label class="btn btn-outline-primary mb-2 mr-2" for="gender_{{ $gender }}">
                                            <input type="radio" name="gender" value="{{ $gender }}" id="gender_{{ $gender }}" autocomplete="off">
                                            {{ ucfirst($gender) }}
                                        </label>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>



                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label required">Select Marital Status / اختر الحالة الاجتماعية</label>
                                <div class="btn-group-toggle" data-toggle="buttons">
                                    @foreach(['single', 'married', 'divorced', 'widowed', 'separated'] as $status)
                                        <label class="btn btn-outline-primary mb-2 mr-2" for="marital_status_{{ $status }}">
                                            <input type="radio" name="marital_status" value="{{ $status }}" id="marital_status_{{ $status }}" autocomplete="off">
                                            {{ ucfirst($status) }}
                                        </label>
                                    @endforeach
                                </div>
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
                            <div class="btn-group-toggle" data-toggle="buttons">
                                @foreach(['Christian', 'Muslim', 'Hindu', 'Buddhism', 'Sikhism','Judaism'] as $religion)
                                    <label class="btn btn-outline-primary mb-2 mr-2" for="religion_{{ $religion }}">
                                        <input type="radio" name="religion" value="{{ $religion }}" id="religion_{{ $religion }}" autocomplete="off">
                                        {{ ucfirst($religion) }}
                                    </label>
                                @endforeach
                            </div>
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
                                <label class="form-label required">Email Id / البريد الالكتروني</label>
                                <input type="email" class="form-control" id="email_id" name="email" placeholder="Email Id" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label required">Phone Number / رقم الهاتف</label>
                                <input type="number" class="form-control" id="phone_number" name="phone" placeholder="Phone Number" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                       
                        
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label required">WhatsApp Number / رقم الواتساب</label>
                                <input type="text" class="form-control" id="whatsapp" name="whatsapp" placeholder="WhatsApp" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label ">Botim Number / رقم البوتيم</label>
                                <input type="text" class="form-control" id="botim" name="botim" placeholder="Botim">
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                      
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label ">Telegram Number / رقم التيلي</label>
                                <input type="text" class="form-control" id="telegram" name="telegram" placeholder="Telegram">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label required">Do you have a valid Passport? / هل لديك جواز سفر صالح?</label>
                            <div class="btn-group-toggle" data-toggle="buttons">
                                @foreach(['yes', 'applied', 'not yet'] as $passport)
                                    <label class="btn btn-outline-primary mb-2 mr-2" for="passport_{{ $passport }}">
                                        <input type="radio" name="passport" value="{{ $passport }}" id="passport_{{ $passport }}" autocomplete="off">
                                        {{ ucfirst(str_replace('_', ' ', $passport)) }}
                                    </label>
                                @endforeach
                            </div>
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
                    <div class="btn-group-toggle" data-toggle="buttons">
                        @foreach(['domestic_helper', 'company', 'other'] as $position)
                            <label class="btn btn-outline-primary mb-2 mr-2" for="position_{{ $position }}">
                                <input type="radio" name="position" value="{{ $position }}" id="position_{{ $position }}" autocomplete="off" required>
                                {{ ucfirst(str_replace('_', ' ', $position)) }}
                            </label>
                        @endforeach
                    </div>
                    </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="job_type" class="form-label required">Job Type / نوع الوظيفة</label>
                    <div class="btn-group-toggle" data-toggle="buttons">
                        @foreach(['full_time', 'part_time', 'temporary', 'permanent', 'fresher', 'freelance'] as $job_type)
                            <label class="btn btn-outline-primary mb-2 mr-2" for="job_type_{{ $job_type }}">
                                <input type="radio" name="job_type" value="{{ $job_type }}" id="job_type_{{ $job_type }}" autocomplete="off" required>
                                {{ ucfirst(str_replace('_', ' ', $job_type)) }}
                            </label>
                        @endforeach
                    </div>
                    <p style="color:red; font-size:13px;">Follow labor laws. Part-time jobs are for permanent residents only.</p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="start_date" class="form-label required">When would you like to start your job? / ما ستبدأ الوظيفة؟?</label>
                    <div class="btn-group-toggle" data-toggle="buttons">
                        <label class="btn btn-outline-primary mb-2 mr-2" for="immediate">
                            <input type="radio" name="start_date" value="immediate" id="immediate" autocomplete="off">
                            Immediate
                        </label>
                        <span class="mx-2 text-secondary">OR</span>
                        <label class="btn  mb-2 mr-2" for="choose_date">
                        <input type="date" class="form-control" id="start_date" name="start_date" 
                        min="{{ \Carbon\Carbon::tomorrow()->toDateString() }}" required >
                        </label>
                    </div>
                   
                 
            </div>
            <p style="color:red; font-size:13px;">Next Available date is required</p>

        </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="visa_type" class="form-label required">Which visa do you have? / ما هو الجواز الذي لديك؟?</label>
                    <div class="btn-group-toggle" data-toggle="buttons">
                        @foreach(['family_visa', 'transfer_visa', 'husband_visa', 'visit_visa', 'employment_visa', 'no_visa', 'to_be_cancelled_visa', 'own_visa', 'cancelled_visa'] as $visa_type)
                            <label class="btn btn-outline-primary mb-2 mr-2" for="visa_type_{{ $visa_type }}">
                                <input type="radio" name="visa_type" value="{{ $visa_type }}" id="visa_type_{{ $visa_type }}" autocomplete="off" required>
                                {{ ucfirst(str_replace('_', ' ', $visa_type)) }}
                            </label>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row">
            

            <div class="row">
            <div class="mb-3">
                <label class="form-label required">Current Work Status / حالة العمل</label>
                <div class="btn-group-toggle" data-toggle="buttons">
                    @foreach([
                        'finish_contract', 'terminated_relocation', 'terminated_other', 'break_contract', 
                        'transfer', 'working_in_home_country', 'unemployed', 'ex_oversea'
                    ] as $status)
                        <label class="btn btn-outline-primary mb-2 mr-2" for="work_status_{{ $status }}">
                            <input type="radio" name="work_status" value="{{ $status }}" id="work_status_{{ $status }}" autocomplete="off" required>
                            {{ ucfirst(str_replace('_', ' ', $status)) }}
                        </label>
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
                    <select name="preferred_location[]" id="preferred_location" class="form-select" required>
                        <option value="">Select Preferred Location</option>
                        <option value="Dubai (UAE)">Dubai (UAE)</option>
                        <option value="Saudi Arabia">Saudi Arabia</option>
                        <option value="Qatar">Qatar</option>
                        <option value="Bahrain">Bahrain</option>
                        <option value="Kuwait">Kuwait</option>
                        <option value="Oman">Oman</option>
                        <option value="Singapore">Singapore</option>
                        <option value="Malaysia">Malaysia</option>
                        <option value="Hongkong">Hongkong</option>
                        <option value="Taiwan">Taiwan</option>
                        <option value="South Korea">South Korea</option>
                        <option value="Turkey">Turkey</option>
                        <option value="Russia">Russia</option>
                        <option value="Jordan">Jordan</option>
                        <option value="Israel">Israel</option>
                        <option value="Italy">Italy</option>
                        <option value="Spain">Spain</option>
                        <option value="France">France</option>
                        <option value="Germany">Germany</option>
                        <option value="United Kingdom">United Kingdom</option>
                        <option value="Ireland">Ireland</option>
                        <option value="Netherlands">Netherlands</option>
                        <option value="Belgium">Belgium</option>
                        <option value="Austria">Austria</option>
                        <option value="Cyprus">Cyprus</option>
                       
                    </select>
            </div>
            <select name="preferred_location[]" class="form-control">
                        <option value="">Other  Country</option>
                        @foreach(countries() as $key => $country)
                            <option value="{{ $key }}" {{ old('country') == $key ? 'selected' : '' }}>
                                {{ htmlspecialchars($country['flag']) }} {{ htmlspecialchars($country['name']) }}
                            </option>
                        @endforeach
                    </select>
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
            <p style="color:red; font-size:13px;">Accommodation preference is required</p>

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
                            <input type="radio" name="english_level" value="{{ $englang }}" id="englang_{{ $englang }}" autocomplete="off">
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
                            <input type="radio" name="arabic_level" value="{{ $arablang }}" id="arablang_{{ $arablang }}" autocomplete="off">
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
                <div class="btn-group-toggle" data-toggle="buttons">
                    @foreach([
                        'Very Fair', 'Fair', 'Medium', 'Dark',
                    ] as $color)
                        <label class="btn btn-outline-primary mb-2 mr-2" for="color_{{ $color }}">
                            <input type="radio" name="color" value="{{ $color }}" id="color_{{ $color }}" autocomplete="off" required>
                            {{ ucfirst($color) }}
                        </label>
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
                <div class="btn-group-toggle" data-toggle="buttons">
                    @foreach(['family', 'company', 'other'] as $employer_type)
                        <label class="btn btn-outline-primary mb-2 mr-2" for="previous_employer_type_{{ $employer_type }}">
                            <input type="radio" name="previous_employer_type" value="{{ $employer_type }}" id="previous_employer_type_{{ $employer_type }}" autocomplete="off" required>
                            {{ ucfirst($employer_type) }}
                        </label>
                    @endforeach
                </div>
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
                <div class="btn-group-toggle" data-toggle="buttons">
                    @foreach(['yes', 'no'] as $reference_letter)
                        <label class="btn btn-outline-primary mb-2 mr-2" for="reference_letter_{{ $reference_letter }}">
                            <input type="radio" name="reference_letter" value="{{ $reference_letter }}" id="reference_letter_{{ $reference_letter }}" autocomplete="off" required>
                            {{ ucfirst($reference_letter) }}
                        </label>
                    @endforeach
                </div>
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

                <select name="previous_worked_country[]" class="form-control">
                        <option value="">Select Country</option>
                        @foreach(countries() as $key => $country)
                            <option value="{{ $key }}" {{ old('country') == $key ? 'selected' : '' }}>
                                {{ htmlspecialchars($country['flag']) }} {{ htmlspecialchars($country['name']) }}
                            </option>
                        @endforeach
                    </select>



            </div>
        </div>
    <div class="row">
        <div class="mb-3">
            <label class="form-label required">What was your duties in your employer's house? / ما هي وظيفتك في منزلك ?</label>
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
        <div class="btn-group-toggle" data-toggle="buttons">
            @foreach(['below_10th', 'high_school','11th','12th', 'bachelor', 'master', 'doctorate', 'university'] as $education_level)
                <label class="btn btn-outline-primary mb-2 mr-2" for="education_{{ $education_level }}">
                    <input type="radio" name="education" value="{{ $education_level }}" id="education_{{ $education_level }}" autocomplete="off" required>
                    {{ ucfirst(str_replace('_', ' ', $education_level)) }}
                </label>
            @endforeach
        </div>
            </div>
        </div>

                </div>

                <div class="row">

                <div class="col-md-6">
                <div class="mb-3">
    <label for="completed_cource" class="form-label">Did you complete this course? / هل قمت بالتعلم هذه الدورة ?</label>
    <div class="btn-group-toggle" data-toggle="buttons">
        @foreach(['yes', 'pending', 'no'] as $completed_cource)
            <label class="btn btn-outline-primary mb-2 mr-2" for="completed_cource_{{ $completed_cource }}">
                <input type="radio" name="completed_cource" value="{{ $completed_cource }}" id="completed_cource_{{ $completed_cource }}" autocomplete="off" required>
                {{ ucfirst($completed_cource) }}
            </label>
        @endforeach
    </div>
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
        <textarea class="form-control" id="resume_description" name="resume_description" placeholder="For Example: Good day ma'am and sir. I am Maricel, 35 years old, single with 3 kids, and Filipino. I have been working for a total of 9 years as a domestic helper. I worked in Singapore for 3 years, 2 years in Saudi Arabia, and 4 years here in Hong Kong. I recent served in an employers with 2 adults, 2 children, 1 elderly, and 3 pets. I have worked for them for 1 year and 2 months. I do all house chores including cooking, marketing, taking care of kids and pets, and housekeeping. My employer terminated our contract last January 10, 2025, and I am looking for a new employer. Thank you." required></textarea>
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

    document.querySelectorAll('.btn-group-toggle input[type="checkbox"]').forEach(function(input) {
        input.addEventListener('change', function() {
            if (this.checked) {
                this.parentElement.classList.add('active');
            } else {
                this.parentElement.classList.remove('active');
            }
        });
    });

    document.querySelectorAll('.btn-group-toggle input[type="radio"]').forEach(function(input) {
        input.addEventListener('change', function() {
            const groupName = this.name;
            document.querySelectorAll(`.btn-group-toggle input[name="${groupName}"]`).forEach(function(radio) {
                radio.parentElement.classList.remove('active');
            });
            this.parentElement.classList.add('active');
        });
    });




</script>






</body>
</html>

