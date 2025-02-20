<x-authlayout title="Galery">
    <section>
        @if (session('success'))
            <x-flash-msg message="{{ session('success') }}" bg="bg-green-500"></x-flash-msg>
        @endif

        <a href="{{ route('galeries.create') }}" class="btn mb-4">Tambah</a>

        <article class="grid grid-cols-2 lg:grid-cols-4 gap-2">
            @foreach ($galeries as $item)
                <x-card-galery :item="$item">
                    <div class="flex gap-2">
                        <a href="{{ route('galeries.edit', $item->slug) }}"
                            class="btn !bg-green-500 hover:!bg-green-600">Edit</a>
                        <form action="{{ route('galeries.destroy', $item->slug) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Are you sure?')" type="submit"
                                class="btn !bg-red-500 hover:!bg-red-600">Hapus</button>
                        </form>
                    </div>
                </x-card-galery>
            @endforeach
        </article>
    </section>
</x-authlayout>
