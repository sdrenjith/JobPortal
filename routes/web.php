<?php

use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Middleware\RoleBasedRedirect;
use Illuminate\Support\Facades\Route;
use App\Filament\Pages\AdminDashboard as FilamentPagesAdminDashboard;
use App\Filament\Pages\UserDashboard as FilamentPagesUserDashboard;
use App\Filament\Pages\CompanyDashboard as FilamentPagesCompanyDashboard;


// Public routes
Route::get('/', function () {
    return view('theme.home-contractors');
})->name('home');

// Registration routes
Route::get('/account-signup', [RegisterController::class, 'showRegistrationForm'])->name('register.form');
Route::post('/account-signup', [RegisterController::class, 'register'])->name('register.form');

Route::get('/account-signin', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/account-signin', [LoginController::class, 'login'])->name('login');

Route::get('/filament/dashboard', 'Filament\Controllers\FilamentController@dashboard');

Route::middleware(['auth'])->group(function () {
    Route::get('/admin/dashboard', FilamentPagesAdminDashboard::class)
    ->name('filament.admin.pages.admin-dashboard');
    Route::get('/company/dashboard', FilamentPagesCompanyDashboard::class)
        ->name('filament.admin.pages.company-dashboard');
    Route::get('/user/dashboard', FilamentPagesUserDashboard::class)
        ->name('filament.admin.pages.user-dashboard');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/filament/resources/users/{record}/edit', [App\Filament\Resources\UserResource\Pages\EditUser::class, 'mount'])->name('filament.resources.users.edit');
});


// Fallback route
Route::fallback(function () {
    return redirect()->route('home');
});