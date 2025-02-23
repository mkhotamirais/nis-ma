<x-layout :title="config('meta.contact.title')" :description="config('meta.contact.description')">
    <section class="section-hero">
        <div class="container">
            <h1 class="title !text-white">Hubungi Kami</h1>
        </div>
    </section>
    <section class="section">
        <div class="container">
            <div class="grid grid-cols-1 md:grid-cols-2">
                <div class="space-y-4">
                    <div>
                        <h2 class="title">Alamat</h2>
                        <p>{{ config('common.common.address') }}</p>
                    </div>
                    <div>
                        <h2 class="title">Kontak</h2>
                        <x-iconbtn href="{{ config('common.common.links.wa-url-m-nur.href') }}"
                            label="{{ config('common.common.links.wa-url-m-nur.label') }}"><x-fab-whatsapp
                                class="size-5" />
                        </x-iconbtn>
                        <x-iconbtn href="{{ config('common.common.links.email-url.href') }}"
                            label="{{ config('common.common.links.email-url.label') }}">
                            <x-heroicon-o-envelope class="size-5" />
                        </x-iconbtn>
                    </div>
                    <div>
                        <h2 class="title">Sosial Media</h2>
                        <x-iconbtn href="{{ config('common.common.links.facebook-ma.href') }}"
                            label="{{ config('common.common.links.facebook-ma.label') }}"><x-fab-facebook
                                class="size-5" />
                        </x-iconbtn>
                        <x-iconbtn href="{{ config('common.common.links.instagram-ma.href') }}"
                            label="{{ config('common.common.links.instagram-ma.label') }}"><x-fab-instagram
                                class="size-5" />
                        </x-iconbtn>
                        <x-iconbtn href="{{ config('common.common.links.youtube-ma.href') }}"
                            label="{{ config('common.common.links.youtube-ma.label') }}"><x-fab-youtube
                                class="size-5" />
                        </x-iconbtn>
                    </div>
                </div>
                <iframe class="w-full aspect-video md:aspect-auto"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.229450175394!2d107.39491247442088!3d-6.982227968373459!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68f123180eac09%3A0xcc118a310eb88034!2sRA%2FMTS%2FMAS%2FPONDOK%20PESANTREN%20NURUL%20IMAN%20BANGONG!5e0!3m2!1sen!2sid!4v1739604555499!5m2!1sen!2sid"
                    width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </section>

</x-layout>
