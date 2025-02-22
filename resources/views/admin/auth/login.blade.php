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
                    <div x-data="{ showPassword: false }" class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <div class="relative">
                            <input :type="showPassword ? 'text' : 'password'"
                                class="form-input !pr-16 @error('password') !border-red-300 @enderror" name="password"
                                id="password" placeholder="********">
                            <button type="button" x-on:click="showPassword = !showPassword"
                                class="absolute top-1/2 -translate-y-1/2 right-2 text-amber-700 font-semibold"
                                x-text="showPassword ? 'Hide' : 'Show'">
                            </button>
                        </div>
                        @error('password')
                            <p class="error">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex justify-between items-center mb-6">

                        {{-- remember me --}}
                        <div class="flex items-center gap-2">
                            <input type="checkbox" name="remember" id="remember">
                            <label for="remember" class="text-gray-600">Remember me</label>
                        </div>
                        {{-- forgot password --}}
                        <a href="{{ route('password.request') }}" class="text-sm text-amber-700 hover:underline">Lupa
                            password?</a>
                    </div>


                    {{-- submit --}}
                    <button type="submit" class="btn ">Login</button>

                </form>
            </article>
        </div>
    </section>
</x-layout>
