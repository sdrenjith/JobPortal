<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Filament\Forms; // Import this namespace for the form schema

class EditUser extends EditRecord
{

    
    protected static string $resource = UserResource::class;

    protected function getHeaderActions(): array
    {
        dd('Page view rendered');

        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function getFormSchema(): array
    {
        dd('EditUser is loading');

        return [
            Forms\Components\TextInput::make('name')
                ->label('Full Name')
                ->required(),
            Forms\Components\FileUpload::make('photo')
                ->label('Profile Photo'),
            // Add other fields as needed
        ];
    }


    // public static function canAccess(): bool
    // {
    //     return Auth::user()->role === 'user';
    // }
}
