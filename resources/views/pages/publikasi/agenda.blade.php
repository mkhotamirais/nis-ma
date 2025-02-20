<x-layout>
    <section class="section bg-emerald-800">
        <div class="container">
            <h1 class="title !text-white mb-2">Agenda</h1>
        </div>
    </section>
    <section class="section">
        <div class="container">
            <article class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-2">
                @foreach ($agendas as $item)
                    <x-card-agenda :item="$item"></x-card-agenda>
                @endforeach
            </article>
        </div>
    </section>
</x-layout>
