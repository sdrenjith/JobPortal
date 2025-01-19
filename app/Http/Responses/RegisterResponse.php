<?php
namespace App\Http\Responses;

use Filament\Facades\Filament;
use Illuminate\Http\RedirectResponse;
use Livewire\Features\SupportRedirects\Redirector;

class RegisterResponse extends \Filament\Http\Responses\Auth\RegistrationResponse 
{
    public function toResponse($request): RedirectResponse|Redirector 
    {
        $user = auth()->user();

        return match($validated['role']) {
            'admin' => redirect()->route('filament.admin.dashboard'),
            'company' => redirect()->route('filament.company.dashboard'),
            'user' => redirect()->route('filament.user.dashboard'),
            default => redirect()->route('home')
        };
    }
}
