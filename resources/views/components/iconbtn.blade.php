@props(['href' => '#', 'label' => 'label'])

<a href="{{ $href }}" class="flex gap-2 items-center hover:text-emerald-700 w-fit transition mb-2">
    {{ $slot }}
    {{ $label }}
</a>
