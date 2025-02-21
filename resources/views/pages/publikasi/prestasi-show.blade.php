<x-layout>
    <section class="section">
        <div class="container">
            <div class="flex flex-col lg:flex-row gap-14 items-start">
                <div class="">
                    <div class="mb-8 text-center">
                        <h1 class="title capitalize mb-2">{{ $achievement->title }}</h1>
                        <p class="text-gray-500">{{ $achievement->created_at->diffForHumans() }}</p>
                    </div>
                    <img src="{{ $achievement->banner ? asset('storage/' . $achievement->banner) : asset('storage/logo/logo-nurul-iman-big.png') }}"
                        alt="{{ $achievement->title }}"
                        class="{{ $achievement->banner ? 'object-cover' : 'object-contain scale-90' }} w-full">
                    <article class="text-content">{!! $achievement->description !!}</article>
                </div>
                <div class="w-64 min-w-full md:min-w-80 sticky top-24">
                    <h2 class="title !mb-6">Prestasi Lainnya</h2>
                    <div class="space-y-8">
                        @foreach ($latestAchievements as $achievement)
                            <div class="grid grid-cols-3 gap-2">
                                <img src="{{ $achievement->banner ? asset('storage/' . $achievement->banner) : asset('storage/logo/logo-nurul-iman-big.png') }}"
                                    alt="{{ $achievement->title }}"
                                    class="{{ $achievement->banner ? 'object-cover' : 'object-contain scale-90' }} h-full w-full">
                                <div class="col-span-2">
                                    <a href="{{ route('achievements.show', $achievement->slug) }}"
                                        class="hover:underline">
                                        <h3 class="title !leading-tight !font-light">
                                            {{ Str::limit($achievement->title, 50) }}
                                        </h3>
                                    </a>
                                    <p class="text-sm text-gray-500">{{ $achievement->created_at->diffForHumans() }}
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layout>
