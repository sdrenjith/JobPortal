<x-filament-panels::page>
<h1>Welcome, {{ auth()->user()->name }}!</h1>

<div class="mt-4">
    <h2>Your Profile Information</h2>
    <div class="p-4 bg-white shadow rounded-lg">
        <table class="w-full border-collapse">
            <tbody>
                @foreach(auth()->user()->getFillable() as $field)
                @if($field !== 'password')
                <tr>
                    <td class="font-bold py-2 border-b">{{ ucfirst(str_replace('_', ' ', $field)) }}:</td>
                    <td class="py-2 border-b">
                        @if($field == 'photo')
                            @if(auth()->user()->photo)
                                <img src="{{ Storage::url(auth()->user()->photo) }}" alt="Profile Photo" class="w-16 h-16 rounded-full">
                            @else
                                <span>No photo uploaded</span>
                            @endif
                        @else
                            {{ auth()->user()->$field ?? 'N/A' }}
                        @endif
                    </td>
                    <td class="py-2 border-b">
                    <a href="{{ route('filament.resources.users.edit', auth()->user()) }}" class="text-blue-600 hover:underline"> Edit </a>
                    </td>
                </tr>
                @endif
                @endforeach
            </tbody>
        </table>
    </div>
</div>
</x-filament-panels::page>
