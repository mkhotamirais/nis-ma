@props(['item' => []])

<div class="flex flex-col border rounded-xl overflow-hidden">
    <div class="grow bg-emerald-700 p-4">
        <h2 class="title !text-xl !text-white text-center">{{ $item->title }}</h2>
    </div>
    <div class="bg-emerald-200 p-4">
        <p class="flex items-center gap-2 mb-2">
            <x-heroicon-o-map-pin />
            {{ $item->location ?? 'MA Nurul Iman' }}
        </p>
        <p class="flex items-center gap-2">
            <x-heroicon-o-calendar-date-range />
            {{-- {{ \Carbon\Carbon::parse($item->date)->translatedFormat('l, d F Y') }} --}}
            {{ \Carbon\Carbon::parse($item->date)->translatedFormat('d F Y') }}
        </p>
        <div class="mt-4 bg-emerald-700 py-1 px-3 rounded-xl text-white w-fit text-sm">{{ $item->status }}</div>
    </div>
    {{ $slot }}
</div>
