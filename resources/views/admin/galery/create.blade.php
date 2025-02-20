<x-authlayout title="Buat Image Baru">
    {{-- session message --}}
    @if (session('success'))
        <x-flash-msg message="{{ session('success') }}"></x-flash-msg>
    @endif

    <form action="{{ route('galeries.store') }}" method="POST" enctype="multipart/form-data" class="">
        @csrf

        {{-- title --}}
        <div class="mb-3">
            <label for="caption" class="form-label">Caption</label>
            <input type="text" class="form-input !w-full @error('caption') !border-red-300 @enderror" name="caption"
                id="caption" value="{{ old('caption') }}" placeholder="Caption image">
            @error('caption')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>

        {{-- image --}}
        <div class="mb-3">
            <label for="image">Image</label>
            <input type="file" name="image" id="image"
                class="form-input @error('image') !ring-red-500 @enderror">
            @error('image')
                <p class="error">{{ $message }}</p>
            @enderror
            <div id="preview-container" class="mt-2 hidden">
                <img id="image-preview" src="" class="w-40 h-auto rounded shadow-md">
                <button type="button" id="remove-image"
                    class="text-red-500 hover:underline text-sm mt-1">Remove</button>
            </div>
        </div>

        {{-- submit --}}
        <button type="submit" class="btn">Create</button>
        <a href="{{ url()->previous() }}" class="btn !bg-gray-300">Back</a>

        <script>
            document.addEventListener("DOMContentLoaded", function() {
                const fileInput = document.getElementById("image");
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
    </form>
</x-authlayout>
