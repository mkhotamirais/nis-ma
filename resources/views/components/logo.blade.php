@props(['color' => 'text-white'])

<a href="{{ route('home') }}" class="flex gap-3 items-center">
    <img src="{{ asset('storage/logo/logo-nurul-iman-big.png') }}" alt="logo nurul iman sindangkerta" class="h-14">
    <div class="{{ $color }}">
        <div class="text-xl font-bold">MA NURUL IMAN</div>
        <div class="text-base leading-none">Sindangkerta</div>
    </div>
</a>
