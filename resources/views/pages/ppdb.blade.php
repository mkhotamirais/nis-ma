<x-layout :title="config('meta.ppdb.title')" :description="config('meta.ppdb.description')">
    <section class="section bg-emerald-800">
        <div class="container">
            <h1 class="title !text-white mb-2">PPDB</h1>
        </div>
    </section>
    <section class="section">
        <div class="container">
            <div>
                <a href="{{ config('common.common.links.ppdb') }}" type="button" class="btn mb-4 inline-block">Daftar
                    Sekarang</a>

                <a href="/storage/images/nis-brosur-terkini.jpg">
                    <img src="{{ asset('storage/images/nis-brosur-terkini.jpg') }}"
                        alt="Brosur PPDB MA Nurul Iman Sindangkerta" loading="lazy" class="rounded-md">
                </a>
                {{-- <ul>
                    <li>Pas foto latar merah ukuran 2x3 dua buah | 3x4 dua buah | 4x6 dua buah</li>
                    <li>Fotokopi Kartu Pelajar</li>
                    <li>Fotokopi Kartu Keluarga (KK)</li>
                    <li>Ijazah atau Surat Keterangan Lulus (SKL)</li>
                    <li>Rapor SMA/SMK/MA sederajat</li>
                    <li>apor SMA/SMK/MA sederajat</li>
                    <li>apor SMA/SMK/MA sederajat</li>
                    <li>Surat lamaran dan pernyataan</li>
                    <li>Dokumen lain sesuai dengan ketentuan instansi yang akan dilamar</li>
                </ul> --}}

            </div>
        </div>
    </section>
</x-layout>
