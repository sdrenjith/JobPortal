<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'photo',
        'age',
        'gender',
        'marital_status',
        'work_experience',
        'children',
        'nationality',
        'current_country',
        'religion',
        'qualification_education',
        'phone',
        'whatsapp',
        'botim',
        'telegram',
        'passport',
        'position',
        'job_type',
        'start_date',
        'work_status',
        'visa_type',
        'preferred_location',
        'expected_salary_currency',
        'expected_salary',
        'day_off_preference',
        'accommodation_preference',
        'language',
        'main_skill',
        'cooking_skills',
        'other_skills',
        'personality',
        'previous_job_position',
        'previous_worked_country',
        'job_start_year',
        'job_start_month',
        'job_end_year',
        'job_end_month',
        'previous_employer_type',
        'previous_employer_nationality',
        'sponsor_house_people',
        'job_in_employers_house',
        'reference_letter',
        'education',
        'duration_of_education',
        'completed_cource',
        'completion_year_of_cource',
        'resume_description',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'start_date' => 'date',
    ];
}
