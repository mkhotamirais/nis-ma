<x-authlayout title="Dashboard">
    <h3 class="title">Welcome {{ Auth::user()->name }}</h3>
    <div class="flex flex-col mt-8 gap-4">
        @foreach (config('common.header.menuadmin') as $menu)
            <a href="{{ route($menu['route']) }}" class="btn">{{ $menu['label'] }}</a>
        @endforeach
    </div>
</x-authlayout>
