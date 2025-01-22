<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static bool $isNavigationHidden = true;

    public static function form(Form $form): Form
{

    
    return $form
        ->schema([
            Forms\Components\TextInput::make('name')
                ->required()
                ->label('Full Name'),

            Forms\Components\TextInput::make('email')
                ->email()
                ->required()
                ->label('Email'),

            Forms\Components\TextInput::make('password')
                ->password()
                ->required()
                ->label('Password'),

            Forms\Components\Select::make('role')
                ->required()
                ->label('Role')
                ->options([
                    'admin' => 'Admin',
                    'user' => 'User',
                    // Add more roles as needed
                ]),

            Forms\Components\FileUpload::make('photo')
                ->label('Profile Photo'),

            Forms\Components\TextInput::make('age')
                ->label('Age'),

            Forms\Components\Select::make('gender')
                ->label('Gender')
                ->options([
                    'male' => 'Male',
                    'female' => 'Female',
                ]),

            Forms\Components\Select::make('marital_status')
                ->label('Marital Status')
                ->options([
                    'single' => 'Single',
                    'married' => 'Married',
                    'divorced' => 'Divorced',
                    'widowed' => 'Widowed',
                ]),

            Forms\Components\TextInput::make('work_experience')
                ->label('Work Experience'),

            Forms\Components\TextInput::make('children')
                ->label('Children'),

            Forms\Components\TextInput::make('nationality')
                ->label('Nationality'),

            Forms\Components\TextInput::make('current_country')
                ->label('Current Country'),

            Forms\Components\TextInput::make('religion')
                ->label('Religion'),

            Forms\Components\TextInput::make('qualification_education')
                ->label('Qualification / Education'),

            Forms\Components\TextInput::make('phone')
                ->label('Phone'),

            Forms\Components\TextInput::make('whatsapp')
                ->label('WhatsApp'),

            Forms\Components\TextInput::make('botim')
                ->label('Botim'),

            Forms\Components\TextInput::make('telegram')
                ->label('Telegram'),

            Forms\Components\TextInput::make('passport')
                ->label('Passport'),

            Forms\Components\TextInput::make('position')
                ->label('Position'),

            Forms\Components\Select::make('job_type')
                ->label('Job Type')
                ->options([
                    'full_time' => 'Full Time',
                    'part_time' => 'Part Time',
                    'contract' => 'Contract',
                ]),

            Forms\Components\DatePicker::make('start_date')
                ->label('Start Date'),

            Forms\Components\TextInput::make('work_status')
                ->label('Work Status'),

            Forms\Components\Select::make('visa_type')
                ->label('Visa Type')
                ->options([
                    'tourist' => 'Tourist',
                    'work' => 'Work',
                    'resident' => 'Resident',
                ]),

            Forms\Components\TextInput::make('preferred_location')
                ->label('Preferred Location'),

            Forms\Components\TextInput::make('expected_salary_currency')
                ->label('Expected Salary Currency'),

            Forms\Components\TextInput::make('expected_salary')
                ->label('Expected Salary'),

            Forms\Components\TextInput::make('day_off_preference')
                ->label('Day Off Preference'),

            Forms\Components\TextInput::make('accommodation_preference')
                ->label('Accommodation Preference'),

            Forms\Components\TextInput::make('language')
                ->label('Languages'),

            Forms\Components\TextInput::make('main_skill')
                ->label('Main Skill'),

            Forms\Components\TextInput::make('cooking_skills')
                ->label('Cooking Skills'),

            Forms\Components\TextInput::make('other_skills')
                ->label('Other Skills'),

            Forms\Components\TextInput::make('personality')
                ->label('Personality'),

            Forms\Components\TextInput::make('previous_job_position')
                ->label('Previous Job Position'),

            Forms\Components\TextInput::make('previous_worked_country')
                ->label('Previous Worked Country'),

            Forms\Components\TextInput::make('job_start_year')
                ->label('Job Start Year'),

            Forms\Components\TextInput::make('job_start_month')
                ->label('Job Start Month'),

            Forms\Components\TextInput::make('job_end_year')
                ->label('Job End Year'),

            Forms\Components\TextInput::make('job_end_month')
                ->label('Job End Month'),

            Forms\Components\TextInput::make('previous_employer_type')
                ->label('Previous Employer Type'),

            Forms\Components\TextInput::make('previous_employer_nationality')
                ->label('Previous Employer Nationality'),

            Forms\Components\TextInput::make('sponsor_house_people')
                ->label('Sponsor House People'),

            Forms\Components\TextInput::make('job_in_employers_house')
                ->label('Job in Employer\'s House'),

            Forms\Components\FileUpload::make('reference_letter')
                ->label('Reference Letter'),

            Forms\Components\TextInput::make('education')
                ->label('Education'),

            Forms\Components\TextInput::make('duration_of_education')
                ->label('Duration of Education'),

            Forms\Components\TextInput::make('completed_cource')
                ->label('Completed Course'),

            Forms\Components\TextInput::make('completion_year_of_cource')
                ->label('Completion Year of Course'),

            Forms\Components\TextInput::make('resume_description')
                ->label('Resume Description'),
        ]);
}


    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }

    public static function canAccess(): bool
{
    return Auth::user()->role === 'user';
}
}


