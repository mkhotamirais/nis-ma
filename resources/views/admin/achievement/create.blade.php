<x-authlayout title="Buat Prestasi Baru">
    {{-- session message --}}
    @if (session('success'))
        <x-flash-msg message="{{ session('success') }}"></x-flash-msg>
    @endif

    <form action="{{ route('achievements.store') }}" method="POST" enctype="multipart/form-data" class="">
        @csrf

        {{-- title --}}
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-input !w-full @error('title') !border-red-300 @enderror" name="title"
                id="title" value="{{ old('title') }}" placeholder="Judul berita">
            @error('title')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>

        {{-- description --}}
        <div class="mb-3">
            <label for="description">Description</label>
            <textarea name="description" id="description" cols="30" rows="10"
                class="input @error('description') !ring-red-500 @enderror">{{ old('description') }}</textarea>
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

        {{-- banner --}}
        <div class="mb-3">
            <label for="banner">Banner</label>
            <input type="file" name="banner" id="banner"
                class="form-input @error('banner') !ring-red-500 @enderror">
            @error('banner')
                <p class="error">{{ $message }}</p>
            @enderror
            <div id="preview-container" class="mt-2 hidden">
                <img id="image-preview" src="" class="w-40 h-auto rounded shadow-md">
                <button type="button" id="remove-image"
                    class="text-red-500 hover:underline text-sm mt-1">Remove</button>
            </div>
        </div>

        <script>
            document.addEventListener("DOMContentLoaded", function() {
                const fileInput = document.getElementById("banner");
                const previewContainer = document.getElementById("preview-container");
                const imagePreview = document.getElementById("image-preview");
                const removeButton = document.getElementById("remove-image");

                fileInput.addEventListener("change", function() {
                    const file = this.files[0];

                    if (file) {
                        const reader = new FileReader();

                        reader.onload = function(e) {
                            imagePreview.src = e.target.result;
                            previewContainer.classList.remove("hidden");
                        };

                        reader.readAsDataURL(file);
                    }
                });

                removeButton.addEventListener("click", function() {
                    fileInput.value = ""; // Reset file input
                    imagePreview.src = "";
                    previewContainer.classList.add("hidden");
                });
            });
        </script>

        {{-- submit --}}
        <button type="submit" class="btn">Create</button>
        <a href="{{ url()->previous() }}" class="btn !bg-gray-300">Back</a>

    </form>
</x-authlayout>
