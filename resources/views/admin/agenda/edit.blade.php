<x-authlayout title="Buat Agenda">
    {{-- session message --}}
    @if (session('success'))
        <x-flash-msg message="{{ session('success') }}"></x-flash-msg>
    @endif

    <form action="{{ route('agendas.update', $agenda) }}" method="POST" enctype="multipart/form-data" class="">
        @csrf
        @method('PUT')

        {{-- title --}}
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-input !w-full @error('title') !border-red-300 @enderror" name="title"
                id="title" value="{{ $agenda->title }}" placeholder="Title image">
            @error('title')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>

        {{-- description --}}
        <div class="mb-3">
            <label for="description">Description</label>
            <textarea name="description" id="description" cols="30" rows="10"
                class="input @error('description') !ring-red-500 @enderror">{{ $agenda->description }}</textarea>
            @error('description')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <script>
            ClassicEditor
                .create(document.querySelector('#description'))
                .catch(error => {
                    console.error(error);
                });
        </script>

        {{-- date --}}
        <div class="mb-3">
            <label for="date" class="form-label">Date</label>
            <input type="date" class="form-input !w-full @error('date') !border-red-300 @enderror" name="date"
                id="date" value="{{ $agenda->date }}" placeholder="Date">
            @error('date')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>

        {{-- location --}}
        <div class="mb-3">
            <label for="location" class="form-label">Location</label>
            <input type="text" class="form-input !w-full @error('location') !border-red-300 @enderror"
                name="location" id="location" value="{{ $agenda->location }}" placeholder="Location image">
            @error('location')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>
        {{-- status --}}
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select class="form-input" name="status" id="status">
                <option value="upcoming" {{ $agenda->status === 'upcoming' ? 'selected' : '' }}>Upcoming</option>
                <option value="ongoing" {{ $agenda->status === 'ongoing' ? 'selected' : '' }}>Ongoing</option>
                <option value="completed" {{ $agenda->status === 'completed' ? 'selected' : '' }}>Completed</option>
            </select>
        </div>

        {{-- submit --}}
        <button type="submit" class="btn">Save</button>
        <a href="{{ url()->previous() }}" class="btn !bg-gray-300">Back</a>

    </form>
</x-authlayout>
