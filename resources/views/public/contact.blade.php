<x-public-layout title="Kontak">
    <x-page-banner title="Hubungi Kami"
                   subtitle="Punya pertanyaan atau ingin berkonsultasi? Tim kami siap membantu Anda."
                   :breadcrumb="[['label' => 'Kontak']]" />

    <section class="bg-white py-20 lg:py-24">
        <div class="container-x grid gap-12 lg:grid-cols-2">
            {{-- Info --}}
            <div>
                <x-section-heading eyebrow="Kontak" title="Mari terhubung" subtitle="Kami senang mendengar dari Anda. Kirim pesan dan tim kami akan segera merespons." />

                <div class="mt-8 space-y-4">
                    @if ($siteSetting->address)
                        <div class="flex items-start gap-4 rounded-2xl border border-slate-100 bg-slate-50 p-5">
                            <span class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-brand-50 text-brand-600"><x-icon name="map-pin" class="h-5 w-5" /></span>
                            <div><p class="font-semibold text-slate-900">Alamat</p><p class="text-sm text-slate-500">{{ $siteSetting->address }}</p></div>
                        </div>
                    @endif
                    @if ($siteSetting->phone)
                        <div class="flex items-start gap-4 rounded-2xl border border-slate-100 bg-slate-50 p-5">
                            <span class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-brand-50 text-brand-600"><x-icon name="phone" class="h-5 w-5" /></span>
                            <div><p class="font-semibold text-slate-900">Telepon</p><a href="tel:{{ $siteSetting->phone }}" class="text-sm text-slate-500 hover:text-brand-600">{{ $siteSetting->phone }}</a></div>
                        </div>
                    @endif
                    @if ($siteSetting->email)
                        <div class="flex items-start gap-4 rounded-2xl border border-slate-100 bg-slate-50 p-5">
                            <span class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-brand-50 text-brand-600"><x-icon name="mail" class="h-5 w-5" /></span>
                            <div><p class="font-semibold text-slate-900">Email</p><a href="mailto:{{ $siteSetting->email }}" class="text-sm text-slate-500 hover:text-brand-600">{{ $siteSetting->email }}</a></div>
                        </div>
                    @endif
                </div>

                @if ($siteSetting->map_embed)
                    <div class="mt-6 overflow-hidden rounded-2xl border border-slate-100 shadow-sm">
                        <iframe src="{{ $siteSetting->map_embed }}" width="100%" height="260" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" title="Peta lokasi"></iframe>
                    </div>
                @endif
            </div>

            {{-- Form --}}
            <div class="rounded-3xl border border-slate-100 bg-white p-6 shadow-sm sm:p-8">
                <h3 class="font-display text-xl font-bold text-slate-900">Kirim Pesan</h3>
                <p class="mt-1 text-sm text-slate-500">Isi formulir di bawah ini dan kami akan menghubungi Anda.</p>
                <div class="mt-6">
                    <x-contact-form />
                </div>
            </div>
        </div>
    </section>
</x-public-layout>
