<x-layout :title="config('meta.galeri.title')" :description="config('meta.galeri.description')">
    <section class="section bg-emerald-800">
        <div class="container">
            <h1 class="title !text-white mb-2">Fasilitas & Galery</h1>
        </div>
    </section>
    <section class="section">
        <div class="container">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-2">
                @foreach ($galeries as $item)
                    <x-card-galery :item="$item"></x-card-galery>
                @endforeach
            </div>
            <div class="mt-8">
                {{ $galeries->links() }}
            </div>
        </div>
    </section>
</x-layout>
