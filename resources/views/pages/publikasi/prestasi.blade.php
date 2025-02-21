<x-layout>
    <section class="section bg-emerald-800">
        <div class="container">
            <h1 class="title !text-white mb-2">Prestasi</h1>
        </div>
    </section>
    <section class="section">
        <div class="container">
            <article class="grid grid-cols-1 gap-8">
                @foreach ($achievements as $item)
                    <x-card-achievement :item="$item"></x-card-achievement>
                @endforeach
            </article>
            <div class="max-w-3xl mt-8">
                {{ $achievements->links() }}
            </div>
        </div>
    </section>
</x-layout>
