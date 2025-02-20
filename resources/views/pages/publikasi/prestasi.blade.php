<x-layout>
    <section class="section bg-emerald-800">
        <div class="container">
            <h1 class="title !text-white mb-2">Prestasi</h1>
        </div>
    </section>
    <section class="section">
        <div class="container">
            <article class="">
                @foreach ($achievements as $item)
                    <x-card-achievement :item="$item"></x-card-achievement>
                @endforeach
            </article>
        </div>
    </section>
</x-layout>
