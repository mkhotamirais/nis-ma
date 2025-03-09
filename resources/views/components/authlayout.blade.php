@props(['title' => 'Dashboard'])

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Dashboard MA Nurul Iman Sindangkerta</title>
    <meta name="description" content="MA Nurul Iman Sindangkerta Description">

    <link rel="shortcut icon" href="{{ asset('storage/logo/favicon.ico') }}" type="image/x-icon">

    {{-- CKEditor --}}
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>

    {{-- alpine --}}
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    {{-- vite --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="flex flex-col min-h-screen">
    {{-- header --}}
    <header class="h-16 bg-emerald-700 sticky top-0 z-50">
        <div class="container">
            <div class="flex items-center justify-between h-full">
                <x-logo color="text-white" />
                {{-- logout --}}
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn !py-2">Logout</button>
                </form>
            </div>
        </div>
    </header>

    {{-- main --}}
    <main x-data="{ openAside: false }" class="container grow min-h-full">
        <div class="flex grow h-full place-items-start items-start">
            @if (Auth::user()->role !== 'user')
                <div class="sticky top-16 z-50">
                    {{-- desktop sidebar --}}
                    <aside class="hidden lg:block w-56 h-full py-4">
                        <div>
                            @foreach (config('common.header.menuadmin') as $menu)
                                @if (Auth::user()->role === 'admin' || (Auth::user()->role === 'editor' && $menu['route'] !== 'users'))
                                    <a href="{{ route($menu['route']) }}"
                                        class="block px-4 py-2 hover:bg-emerald-600 hover:text-white }}">{{ $menu['label'] }}</a>
                                @endif
                            @endforeach
                        </div>
                    </aside>
                    {{-- mobile sidebar --}}
                    <div :class="openAside ? 'opacity-100 visible' : 'opacity-0 invisible'"
                        class="flex lg:hidden fixed inset-0 top-16 bg-black/50 !z-50 transition-all duration-300"
                        x-on:click="openAside = false">
                        <aside x-on:click="(e) => e.stopPropagation()"
                            :class="openAside ? 'translate-x-0' : '-translate-x-full'"
                            class="py-4 bg-white w-56 transition-all duration-200">
                            <div>
                                @foreach (config('common.header.menuadmin') as $menu)
                                    @if (Auth::user()->role === 'admin' || (Auth::user()->role === 'editor' && $menu['route'] !== 'users'))
                                        <a href="{{ route($menu['route']) }}"
                                            class="block px-4 py-2 hover:text-white hover:bg-emerald-600">{{ $menu['label'] }}</a>
                                    @endif
                                @endforeach
                            </div>
                        </aside>
                    </div>
                </div>
            @endif

            <div class="h-full w-full grow p-0 lg:p-4 py-4 border-l-none lg:border-l">
                <div class="flex gap-2 mb-4 items-center">
                    @if (Auth::user()->role !== 'user')
                        <button type="button" x-on:click="openAside = !openAside" class="lg:hidden">
                            <x-heroicon-m-bars-3 class="w-6" />
                        </button>
                    @endif
                    <h2 class="title !mb-0">{{ $title }}</h2>
                </div>
                <div class="w-full">
                    {{ $slot }}
                </div>
            </div>
        </div>
    </main>
    {{-- footer --}}
    <footer class="border-t flex bg-emerald-700 *:text-white py-4">
        <div class="container">
            <p class="">Copyright &copy; {{ date('Y') }} <a href="{{ route('home') }}"
                    class="text-amber-300 font-semibold text-sm">Nurul Iman Sindangekerta</a>
            </p>
        </div>
    </footer>
</body>

</html>
