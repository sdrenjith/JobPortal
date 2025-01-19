<?php
namespace App\Filament\Pages;

use Filament\Pages\Dashboard;
use Illuminate\Support\Facades\Auth; 

class CompanyDashboard extends Dashboard
{
    protected static ?string $navigationIcon = 'heroicon-o-home';
    protected static string $view = 'filament.pages.company-dashboard';
    

    public static function getNavigationLabel(): string
    {
        return 'Company Dashboard';
    }

    public static function canAccess(): bool
    {
        return Auth::user()->role === 'company';
    }
}