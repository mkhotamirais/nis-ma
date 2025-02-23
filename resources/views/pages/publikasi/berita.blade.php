<x-layout :title="config('meta.berita.title')" :description="config('meta.berita.description')">
    <section class="section bg-emerald-800">
        <div class="container">
            <h1 class="title !text-white mb-2">Berita</h1>
        </div>
    </section>
    <section class="section">
        <div class="container">
            <article class="grid grid-cols-1 gap-8">
                @foreach ($news as $item)
                    <x-card-news :item="$item"></x-card-news>
                @endforeach
            </article>
            <div class="max-w-3xl mt-8">
                {{ $news->links() }}
            </div>
        </div>
    </section>
</x-layout>
