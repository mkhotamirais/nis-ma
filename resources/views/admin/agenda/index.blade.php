<x-authlayout title="Agenda">
    <section>
        @if (session('success'))
            <x-flash-msg message="{{ session('success') }}" bg="bg-green-500"></x-flash-msg>
        @endif

        <a href="{{ route('agendas.create') }}" class="btn mb-4">Tambah</a>

        <article class="grid grid-cols-1 md:grid-cols-3 gap-2">
            @foreach ($myAgendas as $item)
                <x-card-agenda :item="$item">
                    <div class="flex gap-2">
                        <a href="{{ route('agendas.edit', $item->slug) }}"
                            class="btn !bg-green-500 hover:!bg-green-600">Edit</a>
                        <form action="{{ route('agendas.destroy', $item->slug) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Are you sure?')" type="submit"
                                class="btn !bg-red-500 hover:!bg-red-600">Hapus</button>
                        </form>
                    </div>
                </x-card-agenda>
            @endforeach
        </article>
    </section>
</x-authlayout>
