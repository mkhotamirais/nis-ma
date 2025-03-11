@props([
    'title' => config('meta.home.title'),
    'description' => config('meta.home.description'),
])

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>{{ $title ?? 'MA Nurul Iman Sindangkerta' }}</title>
    <meta name="description" content="{{ $description ?? 'MA Nurul Iman Sindangkerta Description' }}">

    <link rel="shortcut icon" href="{{ asset('storage/logo/favicon.ico') }}" type="image/x-icon">

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-6RZ3FBFD9Q"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-6RZ3FBFD9Q');
    </script>

    {{-- alpine --}}
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    {{-- vite --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="flex flex-col min-h-screen">
    {{-- social media --}}
    <div class="py-3">
        <div class="container flex flex-col lg:flex-row justify-between items-center gap-2">
            <p class="text-emerald-700 text-center md:text-left text-sm tracking-tight">
                {{ config('common.common.foundation-name') }}</p>
            <x-socials />
        </div>
    </div>
    {{-- header --}}
    <header class="shadow-md h-16 bg-emerald-700 sticky top-0 z-50">
        <div class="container">
            <div class="flex items-center justify-between h-full">
                <x-logo color="text-white" />
                {{-- desktop nav --}}
                <div class="hidden lg:flex items-center">
                    <nav class="flex items-center">
                        @foreach (config('common.header.menu') as $menu)
                            <div class="relative group">
                                <a href="{{ $menu['href'] }}"
                                    class="hover:text-amber-700 transition capitalize px-4 text-white flex items-center gap-2 h-16">
                                    <span>{{ $menu['label'] }}</span>
                                    @if (isset($menu['submenu']))
                                        <x-heroicon-o-chevron-down
                                            class="size-4 font-semibold group-hover:rotate-180 transition-all" />
                                    @endif
                                </a>
                                @if (isset($menu['submenu']))
                                    <div
                                        class="z-50 opacity-0 invisible group-hover:visible group-hover:opacity-100 -translate-y-5 group-hover:translate-y-0 absolute border border-emerald-800 top-full bg-emerald-700 rounded-lg p-4 min-w-full transition-all">
                                        <div class="flex flex-col">
                                            @foreach ($menu['submenu'] as $submenu)
                                                <a href="{{ $submenu['href'] }}"
                                                    class="py-2 block hover:text-amber-300 transition text-white min-w-max">{{ $submenu['label'] }}</a>
                                            @endforeach
                                        </div>
                                    </div>
                                @endif
                            </div>
                        @endforeach
                        <a href="{{ route('contact') }}"
                            class="ml-4 bg-amber-300 hover:bg-amber-400 py-3 px-4 rounded-xl transition-all text-black font-bold">Hubungi
                            Kami</a>
                    </nav>
                </div>
                {{-- mobile nav --}}
                <div id="mobile-nav" x-data="{ open: false }" class="flex lg:hidden">
                    <button type="button" x-on:click="open = !open" :class="open ? 'rotate-90' : ''"
                        class="transition-all text-white">
                        <x-heroicon-m-bars-3 x-show="!open" />
                        <x-heroicon-m-x-mark x-show="open" />
                    </button>
                    <div x-on:click="open = false" :class="open ? 'opacity-100 visible' : 'opacity-0 invisible'"
                        class="fixed inset-0 bg-black/50 transition-all duration-500">
                        <nav x-on:click="(e) => e.stopPropagation()"
                            :class="open ? 'translate-x-0' : '-translate-x-full'"
                            class="overflow-y-scroll w-[85%] sm:w-80 h-full bg-emerald-700 border-r border-emerald-800 transition-all duration-300 p-8">
                            <x-logo />
                            <br>
                            <hr>
                            <div class="flex flex-col mt-4">
                                @foreach (config('common.header.menu') as $menu)
                                    <div x-data="{ openMobileMenu: false }" class="relative group">
                                        <a href="{{ $menu['href'] }}" x-on:click="openMobileMenu = !openMobileMenu"
                                            class="border-b py-3 hover:text-amber-300 text-white flex justify-between items-center">
                                            <span>{{ $menu['label'] }}</span>
                                            @if (isset($menu['submenu']))
                                                <div :class="openMobileMenu ? 'rotate-180' : ''">
                                                    <x-heroicon-o-chevron-down
                                                        class="size-4 font-semibold transition-all" />
                                                </div>
                                            @endif
                                        </a>
                                        @if (isset($menu['submenu']))
                                            <div x-show="openMobileMenu" class="flex flex-col pl-2 mt-2">
                                                @foreach ($menu['submenu'] as $submenu)
                                                    <a href="{{ $submenu['href'] }}"
                                                        class="text-white py-2 hover:text-amber-300">{{ $submenu['label'] }}</a>
                                                @endforeach
                                            </div>
                                        @endif
                                        <div>

                                        </div>
                                    </div>
                                @endforeach
                                <a href="{{ route('contact') }}"
                                    class="block bg-amber-300 hover:bg-amber-400 py-3 px-4 rounded-xl transition-all text-black font-bold text-center mt-8">Hubungi
                                    Kami</a>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </header>
    {{-- main --}}
    <main class="grow">{{ $slot }}</main>
    <a href="{{ config('common.common.links.wa-url-m-nur.href') }}"
        class="fixed bottom-8 right-8 text-green-600 !z-50">
        <x-fab-whatsapp class="size-14" />
    </a>
    {{-- footer --}}
    <footer class="border-t pt-12 flex bg-emerald-700 *:text-white">
        <div class="container">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-12 mb-12">
                <div>
                    <div class="mb-4"><x-logo /></div>
                    <p class="mb-2"><q class="italic">{{ config('common.common.moto') }}</q></p>
                    <p class="text-sm">{{ config('common.common.address') }}</p>
                </div>
                <div>
                    <h2 class="footer-title">Tautan</h2>
                    <div class="flex flex-col gap-2">
                        @foreach (config('common.footer.links') as $menu)
                            <a href="{{ $menu['href'] }}"
                                class="hover:text-amber-300 transition capitalize w-fit">{{ $menu['label'] }}</a>
                        @endforeach
                    </div>
                </div>
                <div>
                    <h2 class="footer-title">Tautan lainnya</h2>
                    <div class="flex flex-col gap-2">
                        @foreach (config('common.footer.other-links') as $menu)
                            <a href="{{ $menu['href'] }}"
                                class="hover:text-amber-300 transition w-fit">{{ $menu['label'] }}</a>
                        @endforeach
                    </div>
                </div>
                <div>
                    <h2 class="footer-title">Hubungi Kami</h2>
                    <div>
                        <p><b>Telepon</b> : {{ config('common.common.links.wa-url-m-nur.label') }}</p>
                        <p><b>Email</b> : {{ config('common.common.links.email-url.label') }}</p>
                        <p class="mb-4"><b>Website</b> : {{ config('common.common.links.website-ma.label') }}</p>
                        <div><x-socials /></div>
                    </div>
                </div>
            </div>
            <hr>
            <p class="py-4">Copyright &copy; {{ date('Y') }} <a href="{{ route('home') }}"
                    class="text-amber-300 font-semibold">Nurul Iman Sindangekerta</a>
            </p>
        </div>
    </footer>
</body>

</html>
