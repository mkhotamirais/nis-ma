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
                        <div x-data="{ showPassword: false }" class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <div class="relative">
                                <input :type="showPassword ? 'text' : 'password'"
                                    class="form-input !pr-16 @error('password') !border-red-300 @enderror"
                                    name="password" id="password" placeholder="********">
                                <button type="button" x-on:click="showPassword = !showPassword"
                                    class="absolute top-1/2 -translate-y-1/2 right-2 text-amber-700 font-semibold"
                                    x-text="showPassword ? 'Hide' : 'Show'">
                                </button>
                            </div>
                            @error('password')
                                <p class="error">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    {{-- password_confirmation --}}
                    <div class="mb-6">
                        <div x-data="{ showPassword: false }" class="mb-3">
                            <label for="password_confirmation" class="form-label">Confirm Password</label>
                            <div class="relative">
                                <input :type="showPassword ? 'text' : 'password'"
                                    class="form-input !pr-16 @error('password') !border-red-300 @enderror"
                                    name="password_confirmation" id="password_confirmation" placeholder="********">
                                <button type="button" x-on:click="showPassword = !showPassword"
                                    class="absolute top-1/2 -translate-y-1/2 right-2 text-amber-700 font-semibold"
                                    x-text="showPassword ? 'Hide' : 'Show'">
                                </button>
                            </div>
                            @error('password')
                                <p class="error">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    {{-- submit --}}
                    <button type="submit" class="btn ">Register</button>
                </form>
            </article>
        </div>
    </section>
</x-layout>
