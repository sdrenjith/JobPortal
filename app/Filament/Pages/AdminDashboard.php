<?php
namespace App\Filament\Pages;

use Filament\Pages\Dashboard;
use Illuminate\Support\Facades\Auth; 

class AdminDashboard extends Dashboard
{
    protected static ?string $navigationIcon = 'heroicon-o-home';
    
    // Add this line to specify the view
    protected static string $view = 'filament.pages.admin-dashboard';

    public static function getNavigationLabel(): string
    {
        return 'Admin Dashboard';
    }

    public static function canAccess(): bool
    {
        return Auth::user()->role === 'admin';
    }
}
