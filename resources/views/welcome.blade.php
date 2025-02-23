<x-layout>
    {{-- hero --}}
    <section class="h-[76vh] relative w-full bg-black/40">
        {{-- <img src="{{ asset('storage/images/pexels-school-hero.jpg') }}" alt="hero image"
            class="h-[76vh] absolute w-full object-cover object-center -z-10"> --}}
        <img src="{{ asset('storage/images/nis-hero-drone-blur.jpg') }}" alt="hero image"
            class="h-[76vh] absolute w-full object-cover object-center -z-10">
        {{-- <img src="{{ asset('storage/images/nis-hero-3.png') }}" alt="hero image"
            class="h-[76vh] absolute w-full object-cover object-center -z-10"> --}}
        <div class="container flex items-center h-full">
            <div class="max-w-5xl">
                <div class="mb-8">
                    <h1 class="text-4xl lg:text-5xl font-bold text-white mb-2">{{ config('common.home.hero.welcome') }}
                    </h1>
                    <q class="text-xl lg:text-2xl text-white italic">{{ config('common.common.moto') }}</q>
                </div>
                <div class="flex flex-col md:flex-row gap-4 w-fit text-center">
                    <a href="{{ route('ppdb') }}"
                        class="btn font-bold">{{ config('common.home.hero.register-btn') }}</a>
                    <a href="https://youtu.be/sZ_BnCo-TSA?si=rKQ_nR2dT3V9JoVI"
                        class="btn !bg-transparent border font-semibold border-amber-300 !text-white hover:!text-amber-400 !flex items-center gap-2">
                        <x-heroicon-c-play class="size-6" /> {{ config('common.home.hero.about-btn') }}</a>
                </div>
            </div>
        </div>
    </section>
    {{-- numbers --}}
    <section class="py-8">
        <div class="container">
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-4">
                @foreach (config('common.home.reason.numbers') as $number)
                    <div
                        class="bg-emerald-700/80 p-8 text-white rounded-lg text-center h-40 flex flex-col gap-4 items-center justify-center">
                        <div class="text-5xl">{{ $number['number'] }}</div>
                        <div class="text-lg">{{ $number['name'] }}</div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    {{-- sambutan --}}
    <section class="section bg-white sm:bg-gray-50">
        <div class="container">
            <article class="bg-white p-0 sm:p-8 rounded-md shadow-none sm:shadow-md">
                <div class="mb-8">
                    <h2 class="title">{{ config('common.home.speech.title') }}</h2>
                    <h3 class="title-accent">{{ config('common.home.speech.principal-name') }}</h3>
                </div>
                <div class="">
                    {{-- <img src="{{ asset('storage/images/nis-kepala-madrasah-a.jpg') }}"
                        alt="Kepala MA Nurul Iman Sindangkerta" loading="lazy"
                        class="float-left w-40 mt-2 mr-4 mb-4 rounded-lg shadow-md"> --}}
                    <img src="{{ asset('storage/images/nis-kepala-madrasah-a.jpg') }}"
                        alt="Kepala MA Nurul Iman Sindangkerta" loading="lazy"
                        class="float-left w-40 lg:w-56 mt-2 mr-4 mb-4 rounded-lg shadow-md brightness-150">
                    <div class="">
                        <p class="mb-2 text-gray-500 font-semibold italic">Assalamualaikum Warahmatullahi Wabarakatuh
                        </p>
                        <p class="mb-2 text-emerald-700 italic"><q>{{ config('common.common.moto2') }}</q></p>

                        @foreach (array_slice(config('common.home.speech.speech'), 0, 3) as $paragraph)
                            <p class="mb-2 text-gray-500">{{ $paragraph }}</p>
                        @endforeach
                        <a href="{{ route('sambutan') }}"
                            class="font-semibold text-amber-700 mt-4 inline-block">Selengkapnya</a>
                    </div>
                </div>
            </article>
        </div>
    </section>

    {{-- alasan memilih kami --}}
    <section class="section bg-emerald-700">
        <div class="container">
            <div class="">
                <h2 class="title !text-white">{{ config('common.home.reason.title') }}</h2>
                <p class="title-desc !text-white">{{ config('common.home.reason.description') }}</p>
            </div>
            <div class="h-1 w-16 bg-amber-300 rounded-full mt-4 mb-8"></div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 md:gap-8">
                @foreach (config('common.home.reason.reasons') as $why)
                    <div class="rounded-2xl bg-white overflow-hidden">
                        <img src="{{ $why['image'] }}" alt="{{ $why['title'] }}"
                            class="w-full h-72 object-cover object-center">
                        <div class="p-6 text-center">
                            <h3 class="text-xl font-bold capitalize mb-4">{{ $why['title'] }}</h3>
                            <p>{{ $why['description'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    {{-- berita --}}
    <section class="section">
        <div class="container">
            <div>
                <h2 class="title">{{ config('common.home.news.title') }}</h2>
                <p class="title-desc">{{ config('common.home.news.description') }}</p>
            </div>
            <div class="h-1 w-16 bg-amber-300 rounded-full mt-4 mb-8"></div>
            <article class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach ($latestNews as $item)
                    <div class="flex flex-col">
                        <img src="{{ $item->banner ? asset('storage/' . $item->banner) : asset('storage/logo/logo-nurul-iman-big.png') }}"
                            alt="{{ $item->title }}"
                            class="{{ $item->banner ? 'object-cover' : 'object-contain scale-90' }} h-56 w-full z-40 rounded-lg mb-2">
                        <a href="{{ route('news.show', $item->slug) }}" class="grow hover:underline">
                            <h3 class="title w-fit first:capitalize">{{ Str::limit($item->title, 75) }}</h3>
                        </a>
                        {{-- <a href="{{ route('news.show', $item->slug) }}" class="btn !w-fit mt-2">Selengkapnya</a> --}}
                    </div>
                @endforeach
            </article>
            <a href="{{ route('berita') }}" class="block btn w-fit font-bold mt-6 !py-4 !px-6 !rounded-full">Berita
                Lainnya</a>
        </div>
    </section>
    {{-- ayo daftar --}}
    <section class="section bg-emerald-700 text-white">
        <div class="container">
            <div class="flex flex-col lg:flex-row justify-between items-center gap-8">
                <h1 class="title text-center">Ayo sekolah di MA Nurul Iman</h1>
                <a href={{ route('ppdb') }} class="btn !text-gray-800 font-bold !py-4 !px-6 !rounded-xl">Daftar
                    Sekarang</a>
            </div>
        </div>
    </section>
    {{-- galery --}}
    <section class="section">
        <div class="container">
            <div>
                <h2 class="title">{{ config('common.home.galery.title') }}</h2>
                <p class="title-desc">{{ config('common.home.galery.description') }}</p>
            </div>
            <div class="h-1 w-16 bg-amber-300 rounded-full mt-4 mb-8"></div>

            <div class="grid grid-cols-2 lg:grid-cols-4 gap-2 lg:gap-4">
                @foreach ($latestGaleries as $item)
                    <x-card-galery :item="$item"></x-card-galery>
                @endforeach
            </div>

            <a href="{{ route('galery') }}" class="block btn w-fit font-bold mt-6 !py-4 !px-6 !rounded-full">Galery
                Lainnya</a>
        </div>
    </section>

</x-layout>
