<x-authlayout title="Users">
    @if (session('success'))
        <x-flash-msg message="{{ session('success') }}" bg="bg-green-500"></x-flash-msg>
    @endif
    @if (session('error'))
        <x-flash-msg message="{{ session('error') }}" bg="bg-red-500"></x-flash-msg>
    @endif
    <div class="grid grid-cols-1 gap-2 lg:grid-cols-3">
        @foreach ($users as $user)
            <div class="border p-4 rounded-lg text-center space-y-2">
                <form action="{{ route('change-role') }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div>{{ $user->name }}</div>
                    <div>{{ $user->email }}</div>
                    <div class="text-emerald-700 font-bold">
                        {{ $user->email_verified_at ? 'Verified' : 'Unverified' }}</div>

                    <input type="hidden" name="user" value="{{ $user->id }}">

                    <select name="role" id="role"
                        {{ $user->email === 'mkhotamirais@gmail.com' ? 'disabled' : '' }}>
                        <option value="user" {{ $user->role === 'user' ? 'selected' : '' }}>User</option>
                        <option value="editor" {{ $user->role === 'editor' ? 'selected' : '' }}>Editor</option>
                        <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin</option>
                    </select>
                    <br>
                    <button type="submit" {{ $user->email === 'mkhotamirais@gmail.com' ? 'disabled' : '' }}
                        class="text-emerald-700 border px-4 py-1 rounded-full mt-4 disabled:opacity-50">Save</button>
                </form>
                <form action="{{ route('users.destroy') }}" method="POST">
                    @csrf
                    @method('DELETE')

                    <input type="hidden" name="user_id" value="{{ $user->id }}">
                    <button type="submit" {{ $user->email === 'mkhotamirais@gmail.com' ? 'disabled' : '' }}
                        onclick="return confirm('Are you sure?')"
                        class="text-red-700 border px-4 py-1 rounded-full disabled:opacity-50">Delete</button>
                </form>
            </div>
        @endforeach
    </div>
</x-authlayout>
