<x-authlayout title="Users">
    @if (session('success'))
        <x-flash-msg message="{{ session('success') }}" bg="bg-green-500"></x-flash-msg>
    @endif
    <div class="grid grid-cols-1 gap-2 lg:grid-cols-3">
        @foreach ($users as $user)
            <div class="border p-4 rounded-lg text-center space-y-2">
                <form action="{{ route('change-role', $user) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div>{{ $user->name }}</div>
                    <div>{{ $user->email }}</div>

                    <input type="hidden" name="user" value="{{ $user->id }}">

                    <select name="role" id="role"
                        {{ $user->email === 'mkhotamirais@gmail.com' ? 'disabled' : '' }}>
                        <option value="user" {{ $user->role === 'user' ? 'selected' : '' }}>User</option>
                        <option value="editor" {{ $user->role === 'editor' ? 'selected' : '' }}>Editor</option>
                        <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin</option>
                    </select>
                    <br>
                    <button type="submit" {{ $user->email === 'mkhotamirais@gmail.com' ? 'disabled' : '' }}
                        class="text-emerald-700 border px-4 py-1 rounded-full mt-4">Save</button>
                </form>
            </div>
        @endforeach
    </div>
</x-authlayout>
