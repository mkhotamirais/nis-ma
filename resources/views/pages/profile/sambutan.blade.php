<x-layout :title="config('meta.sambutan.title')" :description="config('meta.sambutan.description')">
    <section class="section bg-emerald-800">
        <div class="container">
            <h1 class="title !text-white mb-2">Sambutan Kepala Madrasah</h1>
        </div>
    </section>
    <section class="section bg-white lg:bg-gray-50">
        <div class="container bg-white p-4 lg:p-12 rounded-md">
            <div class="mb-8">
                <h2 class="title">Sambutan Kepala MA Nurul Iman Sindangkerta</h2>
                <h3 class="title-accent">{{ config('common.home.speech.principal-name') }}</h3>
            </div>
            <img src="{{ asset('storage/images/nis-kepala-madrasah-a.jpg') }}" alt="Kepala MA Nurul Iman Sindangkerta"
                loading="lazy" class="float-left w-40 lg:w-56 mt-2 mr-4 mb-4 rounded-lg shadow-md brightness-150">
            <div class="">
                <p class="mb-2 text-gray-500 font-semibold italic">Assalamualaikum Warahmatullahi Wabarakatuh
                </p>
                <p class="mb-2 text-emerald-700 italic"><q>{{ config('common.common.moto2') }}</q></p>
                @foreach (config('common.home.speech.speech') as $paragraph)
                    <p class="mb-2 text-gray-500">{{ $paragraph }}</p>
                @endforeach
                <p><i>Wallahul muwaffiq ila aqwamit tharieq, Wssalamualaikum Warahmatullahi Wabarakatuh</i></p>
            </div>
        </div>
    </section>
</x-layout>
