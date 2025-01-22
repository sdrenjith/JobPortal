<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Filament\Forms; 

class EditUser extends EditRecord
{


    
    protected static string $resource = UserResource::class;

    // protected static string $view = 'filament.resources.users.edit-user';


    protected function getHeaderActions(): array
    {
       

        return [
            Actions\DeleteAction::make(),
        ];
    }



}
