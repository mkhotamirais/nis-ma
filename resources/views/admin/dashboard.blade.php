<x-authlayout title="Dashboard">
    <h3 class="title">Welcome {{ Auth::user()->name }} you are {{ Auth::user()->role }}</h3>
    <div class="flex flex-col mt-8 gap-4">
        @foreach (config('common.header.menuadmin') as $menu)
            @if (Auth::user()->role === 'admin' ||
                    (Auth::user()->role === 'editor' && $menu['route'] !== 'users') ||
                    (Auth::user()->role === 'user' && $menu['route'] === 'dashboard'))
                <a href="{{ route($menu['route']) }}" class="btn">{{ $menu['label'] }}</a>
            @endif
        @endforeach
    </div>
</x-authlayout>
