@props(['item' => []])

<div class="">
    <figure class="figure">
        <img src="{{ $item->image ? asset('storage/' . $item->image) : asset('storage/logo/logo-nurul-iman-big.png') }}"
            alt="{{ $item->caption }}"
            class="{{ $item->image ? 'object-cover' : 'object-contain scale-90' }} rounded-lg h-48 w-full z-40">
        <figcaption class="figure-caption text-start text-gray-500 italic">
            {{ $item->caption }}
        </figcaption>
    </figure>

    {{ $slot }}
</div>
