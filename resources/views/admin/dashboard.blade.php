<x-authlayout title="Dashboard">
    <h3 class="title !font-medium">Welcome <span class="font-bold capitalize">{{ Auth::user()->name }}</span> you are
        {{ Auth::user()->role }}</h3>
    <form action="{{ route('update-me') }}" method="POST">
        @csrf
        @method('PATCH')

        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" id="name" value="{{ Auth::user()->name }}" class="form-input">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" value="{{ Auth::user()->email }}" class="form-input">
        </div>
        <button type="submit" class="btn">Save</button>
    </form>
    <div class="flex flex-col mt-8 gap-4">
        @if (Auth::user()->role !== 'user')
            @foreach (config('common.header.menuadmin') as $menu)
                @if (Auth::user()->role === 'admin' || (Auth::user()->role === 'editor' && $menu['route'] !== 'users'))
                    <a href="{{ route($menu['route']) }}" class="btn">{{ $menu['label'] }}</a>
                @endif
            @endforeach
        @endif
    </div>
</x-authlayout>
