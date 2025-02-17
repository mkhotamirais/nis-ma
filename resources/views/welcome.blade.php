<x-layout>
    {{-- hero --}}
    <section class="h-[75vh] relative w-full bg-gradient-to-b from-black/30 to-black/60">
        <img src="{{ asset('storage/images/pexels-school-hero.jpg') }}" alt="hero image"
            class="h-[75vh] absolute w-full object-cover object-center -z-10">
        <div class="container flex items-center h-full">
            <div class="max-w-5xl">
                <div class="mb-8">
                    <h1 class="text-4xl lg:text-5xl font-bold text-white mb-2">{{ config('common.home.hero.welcome') }}
                    </h1>
                    <p class="text-xl lg:text-2xl text-white italic">{{ config('common.home.hero.moto') }}</p>
                </div>
                <div class="flex flex-col md:flex-row gap-4 w-fit text-center">
                    <a href="{{ route('ppdb') }}"
                        class="btn font-bold">{{ config('common.home.hero.register-btn') }}</a>
                    <a href="{{ route('tentang') }}"
                        class="btn !bg-transparent border font-semibold border-amber-300 !text-white hover:!text-amber-400">{{ config('common.home.hero.about-btn') }}</a>
                </div>
            </div>
        </div>
    </section>
    {{-- numbers --}}
    <section class="bg-gray-100 py-8">
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
    <section class="section">
        <div class="container">
            <div class="mb-8">
                <h2 class="title">{{ config('common.home.speech.title') }}</h2>
                <h3 class="title-accent">{{ config('common.home.speech.principal-name') }}</h3>
            </div>
            <div class="">
                <img src="{{ asset('storage/images/kepala-sekolah-ni.webp') }}" alt="kepala sekolah"
                    class="float-left w-40 mt-2 mr-4 mb-4 rounded-lg">
                <div class="">
                    @foreach (config('common.home.speech.speech') as $paragraph)
                        <p class="mb-2 text-gray-500">{{ $paragraph }}</p>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    {{-- alasan memilih kami --}}
    <section class="section bg-emerald-700">
        <div class="container">
            <div class="mb-8">
                <h2 class="title !text-white">{{ config('common.home.reason.title') }}</h2>
                <p class="title-desc text-white">{{ config('common.home.reason.description') }}
                </p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 md:gap-8">
                @foreach (config('common.home.reason.reasons') as $why)
                    <div class="rounded-2xl bg-white overflow-hidden">
                        <img src="{{ $why['image'] }}" alt="{{ $why['title'] }}"
                            class="w-full object-cover object-center">
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
            <div class="mb-8">
                <h2 class="title">{{ config('common.home.news.title') }}</h2>
                <p class="title-desc">{{ config('common.home.news.description') }}</p>
            </div>
            {{-- <div class="grid grid-cols-3 gap-4">
                <div>berita 1</div>
                <div>berita 2</div>
                <div>berita 3</div>
            </div> --}}
        </div>
    </section>
    {{-- galery --}}
    <section class="section">
        <div class="container">
            <div class="mb-8">
                <h2 class="title">{{ config('common.home.galery.title') }}</h2>
                <p class="title-desc">{{ config('common.home.galery.description') }}</p>
            </div>
            {{-- <div class="grid grid-cols-3 gap-4">
                <div>galery 1</div>
                <div>galery 2</div>
                <div>galery 3</div>
            </div> --}}
        </div>
    </section>
    {{-- contact --}}
    {{-- <section class="section">
        <div class="container">
            <div class="mb-8">
                <h2 class="title">{{ config('common.home.contact.title') }}</h2>
                <p class="title-desc">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos, natus.</p>
            </div>
            <div class="grid grid-cols-3 gap-4">
                <div>contact 1</div>
                <div>contact 2</div>
                <div>contact 3</div>
            </div>
        </div>
    </section> --}}
</x-layout>
