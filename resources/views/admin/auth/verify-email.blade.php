<x-layout>

    <div class="container text-center py-12">
        <h1 class="mb-4">Please verify your email through the email we've sent you</h1>
        <p>Didn't get the email?</p>
        <form action="{{ route('verification.send') }}" method="POST">
            @csrf
            <button type="submit" class="btn !mt-4">Send again</button>
        </form>
        <div class="mt-4">
            <p>Jika masih tidak mendapat email, mungkin kamu salah memasukan email, pastikan email kamu terdaftar!</p>
            <form action="{{ route('wrong-email-register') }}" method="POST">
                @csrf
                <button type="submit" class="!py-2 text-amber-700 underline">Input ulang email?</button>
            </form>
        </div>
    </div>

</x-layout>
