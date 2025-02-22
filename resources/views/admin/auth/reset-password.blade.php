<x-layout>
    <div class="container py-12">
        <div class="mx-auto max-w-screen-sm card">
            <h1 class="title !mb-8">Reset your password</h1>
            <form action="{{ route('password.update') }}" method="POST">
                @csrf

                <input type="hidden" name="token" value="{{ $token }}">

                {{-- email --}}
                <div class="mb-4">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" name="email" id="email" value="{{ old('email') }}"
                        class="form-input @error('email') !ring-red-500 @enderror" placeholder="Your email">
                    @error('email')
                        <p class="error">{{ $message }}</p>
                    @enderror
                </div>
                {{-- password --}}
                <div class="mb-4">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" id="password"
                        class="form-input @error('password') !ring-red-500 @enderror" placeholder="********">
                    @error('password')
                        <p class="error">{{ $message }}</p>
                    @enderror
                </div>
                {{-- confirm password --}}
                <div class="mb-4">
                    <label for="password_confirmation" class="form-label">Confirm Password</label>
                    <input type="password" name="password_confirmation" id="password_confirmation"
                        class="form-input @error('password') !ring-red-500 @enderror" placeholder="********">
                </div>

                {{-- submit button --}}
                <button type="submit" class="btn">Reset password</button>
            </form>
        </div>
    </div>

</x-layout>
