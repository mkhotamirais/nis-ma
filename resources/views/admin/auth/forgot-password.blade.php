<x-layout>
    <div class="container py-12">
        <div class="mx-auto max-w-screen-sm card">
            <h1 class="title !mb-8">Request a password reset email</h1>
            @if (session('status'))
                <x-flash-msg msg="{{ session('status') }}" />
            @endif


            <form action="{{ route('password.request') }}" method="POST">
                @csrf

                {{-- email --}}
                <div class="mb-4">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" name="email" id="email" value="{{ old('email') }}"
                        class="form-input @error('email') !ring-red-500 @enderror"
                        placeholder="email untuk reset password">
                    @error('email')
                        <p class="error">{{ $message }}</p>
                    @enderror
                </div>

                {{-- submit button --}}
                <button type="submit" class="btn">Submit</button>

            </form>
        </div>

    </div>


</x-layout>
