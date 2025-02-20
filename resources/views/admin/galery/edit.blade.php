<x-authlayout title="Update Image">
    {{-- session message --}}
    @if (session('success'))
        <x-flash-msg message="{{ session('success') }}"></x-flash-msg>
    @endif

    <form action="{{ route('galeries.update', $galery) }}" method="POST" enctype="multipart/form-data" class="">
        @csrf
        @method('PUT')

        {{-- caption --}}
        <div class="mb-3">
            <label for="caption" class="form-label">Caption</label>
            <input type="text" class="form-input !w-full @error('caption') !border-red-300 @enderror" name="caption"
                id="caption" value="{{ $galery->caption }}" placeholder="Judul berita">
            @error('caption')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>

        {{-- image --}}
        @if ($galery->image)
            <label>Current image</label>
            <figure class="h-40 w-64 rounded-md mb-4 overflow-hidden">
                <img id="current-image" src="{{ asset('storage/' . $galery->image) }}"
                    alt="{{ $galery->title ?? 'Galery Image' }}" width="400" height="400"
                    class="w-full h-full object-cover origin-center">
            </figure>
        @endif

        {{-- Preview Gambar Baru --}}
        <div class="mb-3">
            <label for="image">Image</label>
            <input type="file" name="image" id="image"
                class="form-input @error('image') !ring-red-500 @enderror" onchange="previewImage(event)">
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
        <button type="submit" class="btn">Save</button>
        <a href="{{ url()->previous() }}" class="btn !bg-gray-300">Back</a>

        <script>
            function previewImage(event) {
                const input = event.target;
                const previewContainer = document.getElementById('preview-container');
                const previewImage = document.getElementById('preview-image');

                if (input.files && input.files[0]) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        previewContainer.classList.remove('hidden');
                        previewImage.src = e.target.result;
                    };
                    reader.readAsDataURL(input.files[0]);
                }
            }

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
