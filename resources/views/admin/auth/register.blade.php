<x-layout>
    <section class="section">
        <div class="container">
            <article class="max-w-xl mx-auto">
                <h1 class="title !text-black">Register</h1>
                <form action="{{ route('register') }}" method="POST" class="mt-8">
                    @csrf

                    {{-- name --}}
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="name" class="form-input @error('name') !border-red-300 @enderror" id="name"
                            name="name" placeholder="Your name" value="{{ old('name') }}">
                        @error('name')
                            <p class="error">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- email --}}
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-input @error('email') !border-red-300 @enderror"
                            name="email" id="email" placeholder="Your email" value="{{ old('email') }}">
                        @error('email')
                            <p class="error">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- password --}}
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-input @error('password') !border-red-300 @enderror"
                            name="password" id="password" placeholder="********">
                        @error('password')
                            <p class="error">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- password_confirmation --}}
                    <div class="mb-6">
                        <label for="password_confirmation" class="form-label">Confirm Password</label>
                        <input type="password" class="form-input @error('password') !border-red-300 @enderror"
                            name="password_confirmation" id="password_confirmation" placeholder="********">
                        @error('password_confirmation')
                            <p class="error">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- submit --}}
                    <button type="submit" class="btn ">Register</button>
                </form>
            </article>
        </div>
    </section>
</x-layout>
