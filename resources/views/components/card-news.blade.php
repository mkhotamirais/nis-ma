@props(['item' => []])

<div class="rounded overflow-hidden sm:flex sm:flex-row sm:gap-6 max-w-3xl">
    <img src="{{ $item->banner ? asset('storage/' . $item->banner) : asset('storage/logo/logo-nurul-iman-big.png') }}"
        alt="{{ $item->title }}" loading="lazy"
        class="{{ $item->banner ? 'object-cover' : 'object-contain scale-90' }} h-56 sm:h-full w-full sm:w-56 z-40">
    <div class="">
        <a href="{{ route('news.show', $item->slug) }}" class="hover:underline">
            <h3 class="title first:capitalize mt-4 sm:mt-0 !mb-2">{{ $item->title }}</h3>
        </a>
        <p class="mb-2 text-sm text-gray-500">{{ $item->created_at->diffForHumans() }}</p>
        <div class="text-gray-700 grow">{!! Str::limit($item->content, 200) !!}</div>
        <a href="{{ route('news.show', $item->slug) }}" class="btn mt-4">Selengkapnya</a>
        <div class="mt-2">
            {{ $slot }}
        </div>
    </div>
</div>
