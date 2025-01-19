<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToUsersTable extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('marital_status')->nullable();
            $table->string('children')->nullable();
            $table->string('religion')->nullable();
            $table->string('qualification_education')->nullable();
            $table->string('phone')->nullable();
            $table->string('whatsapp')->nullable();
            $table->string('botim')->nullable();
            $table->string('telegram')->nullable();
            $table->string('passport')->nullable();
            $table->string('position')->nullable();
            $table->string('job_type')->nullable();
            $table->date('start_date')->nullable();
            $table->string('work_status')->nullable();
            $table->string('visa_type')->nullable();
            $table->string('preferred_location')->nullable();
            $table->string('expected_salary_currency')->nullable();
            $table->decimal('expected_salary', 10, 2)->nullable();
            $table->string('day_off_preference')->nullable();
            $table->string('accommodation_preference')->nullable();
            $table->string('language')->nullable();
            $table->string('main_skill')->nullable();
            $table->string('cooking_skills')->nullable();
            $table->string('other_skills')->nullable();
            $table->string('personality')->nullable();
            $table->string('previous_job_position')->nullable();
            $table->string('previous_worked_country')->nullable();
            $table->integer('job_start_year')->nullable();
            $table->string('job_start_month')->nullable();
            $table->integer('job_end_year')->nullable();
            $table->string('job_end_month')->nullable();
            $table->string('previous_employer_type')->nullable();
            $table->string('previous_employer_nationality')->nullable();
            $table->integer('sponsor_house_people')->nullable();
            $table->string('job_in_employers_house')->nullable();
            $table->string('reference_letter')->nullable();
            $table->string('education')->nullable();
            $table->string('duration_of_education')->nullable();
            $table->string('completed_cource')->nullable();
            $table->integer('completion_year_of_cource')->nullable();
            $table->text('resume_description')->nullable();
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'marital_status',
                'children',
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
            ]);
        });
    }
}
