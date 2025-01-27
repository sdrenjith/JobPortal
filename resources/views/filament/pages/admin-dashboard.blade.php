<x-filament-panels::page>

    <h1 class="text-3xl">Welcome, {{ auth()->user()->name }}!</h1>

    <div class="mt-4">
        <div class="p-4 bg-white shadow rounded-lg">
            <table class="w-full border-collapse">
                <thead>
                    <tr>
                        <th class="py-2 border-b">Name</th>
                        <th class="py-2 border-b">Email</th>
                        <th class="py-2 border-b">Created At</th>
                        <th class="py-2 border-b">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users ?? [] as $user)
                    <tr>
                        <td class="py-2 border-b">{{ $user->name }}</td>
                        <td class="py-2 border-b">{{ $user->email }}</td>
                        <td class="py-2 border-b">{{ $user->created_at->format('M d, Y') }}</td>
                        <td class="py-2 border-b">
                            <a href="{{ route('filament.resources.users.edit', $user) }}" class="text-blue-600 hover:underline">Edit</a>
                            <a href="{{ route('filament.resources.users.delete', $user) }}" class="text-red-600 hover:underline">Delete</a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="py-2 border-b text-center">No users found.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</x-filament-panels::page>


