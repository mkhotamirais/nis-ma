<x-layout>
    <section class="section">
        <div class="container">
            <article class="max-w-xl mx-auto">
                <h1 class="title !text- !mb-2">login</h1>
                @if (session('failed'))
                    <x-flash-msg message="{{ session('failed') }}" bg="bg-red-500"></x-flash-msg>
                @endif
                <form action="{{ route('login') }}" method="POST" class="mt-6">
                    @csrf

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

                    {{-- remember me --}}
                    <div class="mb-6 flex items-center gap-2">
                        <input type="checkbox" name="remember" id="remember">
                        <label for="remember" class="text-gray-600">Remember me</label>
                    </div>

                    {{-- submit --}}
                    <button type="submit" class="btn ">Login</button>

                </form>
            </article>
        </div>
    </section>
</x-layout>
