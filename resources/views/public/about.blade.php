<x-public-layout title="Tentang Kami">
    <x-page-banner title="Tentang Kami"
                   subtitle="Mengenal lebih dekat {{ $siteSetting->company_name }} — partner transformasi digital Anda."
                   :breadcrumb="[['label' => 'Tentang Kami']]" />

    {{-- Intro --}}
    <section class="bg-white py-20 lg:py-24">
        <div class="container-x grid items-center gap-12 lg:grid-cols-2">
            <div class="aspect-[3/2] overflow-hidden rounded-3xl bg-gradient-to-br from-brand-600 to-indigo-800 shadow-xl">
                @if ($profile->image)
                    <img src="{{ asset('storage/'.$profile->image) }}" alt="{{ $siteSetting->company_name }}" class="h-full w-full object-cover">
                @else
                    <div class="flex h-full w-full items-center justify-center text-white/40"><x-icon name="building" class="h-24 w-24" /></div>
                @endif
            </div>
            <div>
                <x-section-heading eyebrow="Profil Perusahaan" title="{{ $siteSetting->company_name }}" />
                <div class="mt-5 space-y-4 leading-relaxed text-slate-500">
                    {!! nl2br(e($profile->about)) !!}
                </div>
            </div>
        </div>
    </section>

    {{-- Solusi Transformasi Bisnis --}}
    <section class="bg-slate-50 py-20 lg:py-24">
        <div class="container-x">
            <x-section-heading center eyebrow="Solusi Transformasi Bisnis"
                title="Teknologi sebagai akselerator transformasi" />
            <div class="mx-auto mt-6 max-w-3xl space-y-4 text-center leading-relaxed text-slate-500">
                <p>Untuk dapat mempercepat proses transformasi bisnis, teknologi adalah salah satu hal yang paling dapat dimanfaatkan untuk membantu bisnis Anda mencapai semuanya, setelah itu diikuti oleh berbagai strategi lainnya.</p>
                <p>Setidaknya, ada 3 poin yang dapat dijadikan ukuran dalam menentukan transformasi bisnis yang sukses. Kita harus fokus pada poin pertama — <span class="font-semibold text-slate-700">solusi efektif dan inovatif</span>. Ketika poin pertama berhasil diterapkan, maka poin selanjutnya pasti akan mudah didapatkan.</p>
            </div>

            {{-- 3 poin ukuran --}}
            <div class="mx-auto mt-12 grid max-w-4xl gap-5 sm:grid-cols-3">
                <div class="rounded-2xl bg-brand-600 p-6 text-white shadow-lg shadow-brand-600/20">
                    <span class="flex h-11 w-11 items-center justify-center rounded-xl bg-white/15"><x-icon name="rocket" class="h-6 w-6" /></span>
                    <p class="mt-4 text-xs font-semibold uppercase tracking-wider text-brand-100">Poin utama</p>
                    <p class="mt-1 font-display text-lg font-bold">Solusi efektif &amp; inovatif</p>
                </div>
                <div class="rounded-2xl border border-slate-200 bg-white p-6">
                    <span class="flex h-11 w-11 items-center justify-center rounded-xl bg-brand-50 text-brand-600"><x-icon name="chart" class="h-6 w-6" /></span>
                    <p class="mt-4 text-xs font-semibold uppercase tracking-wider text-slate-400">Berikutnya</p>
                    <p class="mt-1 font-display text-lg font-bold text-slate-900">Pertumbuhan penjualan</p>
                </div>
                <div class="rounded-2xl border border-slate-200 bg-white p-6">
                    <span class="flex h-11 w-11 items-center justify-center rounded-xl bg-brand-50 text-brand-600"><x-icon name="briefcase" class="h-6 w-6" /></span>
                    <p class="mt-4 text-xs font-semibold uppercase tracking-wider text-slate-400">Berikutnya</p>
                    <p class="mt-1 font-display text-lg font-bold text-slate-900">Efisiensi biaya operasional</p>
                </div>
            </div>
        </div>
    </section>

    {{-- Solusi efektif dan inovatif --}}
    <section class="bg-white py-20 lg:py-24">
        <div class="container-x grid gap-12 lg:grid-cols-5">
            <div class="lg:col-span-2">
                <x-section-heading eyebrow="Fokus Utama" title="Solusi efektif dan inovatif" />
                <div class="mt-6 h-1 w-16 rounded-full bg-brand-600"></div>
            </div>
            <div class="space-y-4 leading-relaxed text-slate-500 lg:col-span-3">
                <p>Solusi efektif dan inovatif ini tidak lagi terbatas pada sebuah produk teknologi, tapi juga pada bagaimana perusahaan menerapkan strategi baru untuk menciptakan situasi internal perusahaan yang lebih baik dari sebelumnya. Menciptakan situasi perusahaan yang lebih baik ini dapat dilakukan dengan mengkombinasikan kemampuan teknologi dan manusia. Melakukan investasi teknologi baru adalah hal yang sangat penting, namun mempersiapkan Sumber Daya Manusia yang siap melakukan transformasi juga tidak kalah pentingnya. Transformasi harus dilakukan dengan implementasi teknologi yang tepat, namun keberhasilannya juga sangat dipengaruhi oleh kualitas dari SDM yang menjalaninya.</p>
                <p>Transformasi yang sukses adalah untuk perusahaan yang mampu mengaplikasikan teknologi demi membangun model bisnis baru yang modern dan terintegrasi. Hasil dari transformasi ini menghasilkan pendapatan yang lebih menguntungkan, manfaat yang lebih kompetitif, serta tingkat efektivitas dalam berbagai aspek yang lebih tinggi.</p>
            </div>
        </div>
    </section>

    {{-- Vision / Mission / History --}}
    <section class="bg-slate-50 py-20 lg:py-24">
        <div class="container-x grid gap-6 lg:grid-cols-3">
            @foreach ([
                ['icon' => 'eye', 'title' => 'Visi', 'body' => $profile->vision],
                ['icon' => 'check-circle', 'title' => 'Misi', 'body' => $profile->mission],
                ['icon' => 'clock', 'title' => 'Perjalanan Kami', 'body' => $profile->history],
            ] as $block)
                @if ($block['body'])
                    <div class="rounded-3xl border border-slate-100 bg-white p-7 shadow-sm">
                        <span class="flex h-12 w-12 items-center justify-center rounded-xl bg-brand-50 text-brand-600"><x-icon :name="$block['icon']" class="h-6 w-6" /></span>
                        <h3 class="mt-5 font-display text-lg font-bold text-slate-900">{{ $block['title'] }}</h3>
                        <p class="mt-2 text-sm leading-relaxed text-slate-500">{{ $block['body'] }}</p>
                    </div>
                @endif
            @endforeach
        </div>
    </section>

    {{-- Why us --}}
    @if ($features->isNotEmpty())
        <section class="bg-white py-20 lg:py-24">
            <div class="container-x">
                <x-section-heading center eyebrow="Mengapa Memilih Kami" title="Nilai yang kami pegang" />
                <div class="mt-12 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
                    @foreach ($features as $feature)
                        <div class="rounded-2xl border border-slate-100 bg-slate-50 p-6 transition hover:border-brand-200 hover:bg-white hover:shadow-md">
                            <span class="flex h-12 w-12 items-center justify-center rounded-xl bg-brand-600 text-white"><x-icon :name="$feature->icon ?: 'shield-check'" class="h-6 w-6" /></span>
                            <h3 class="mt-5 font-display text-lg font-bold text-slate-900">{{ $feature->title }}</h3>
                            <p class="mt-2 text-sm leading-relaxed text-slate-500">{{ $feature->description }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- Team --}}
    @if ($team->isNotEmpty())
        <section class="bg-slate-50 py-20 lg:py-24">
            <div class="container-x">
                <x-section-heading center eyebrow="Tim Kami" title="Orang-orang di balik EFEA" />
                <div class="mt-12 grid gap-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-6">
                    @foreach ($team as $member)
                        <x-team-card :member="$member" />
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    <x-cta-banner />
</x-public-layout>
