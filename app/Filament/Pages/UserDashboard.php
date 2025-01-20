<?php
namespace App\Filament\Pages;

use Filament\Pages\Dashboard;
use Illuminate\Support\Facades\Auth; 

class UserDashboard extends Dashboard
{
    protected static ?string $navigationIcon = 'heroicon-o-home';
    protected static string $view = 'filament.pages.user-dashboard';

    public static function getNavigationLabel(): string
    {
        return 'User Dashboard';
    }

    public static function canAccess(): bool
    {
        return Auth::user()->role === 'user';
    }
}
