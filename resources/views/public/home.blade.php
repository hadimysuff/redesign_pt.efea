<x-public-layout>
    {{-- ============================= HERO ============================= --}}
    <section class="relative overflow-hidden bg-slate-950 pt-16 lg:pt-20">
        {{-- Decorative background --}}
        <div class="absolute inset-0 bg-gradient-to-br from-brand-700 via-brand-800 to-indigo-950"></div>
        <div class="absolute -left-24 top-10 h-72 w-72 animate-float-slow rounded-full bg-brand-500/30 blur-3xl"></div>
        <div class="absolute -right-16 bottom-0 h-80 w-80 animate-pulse-slow rounded-full bg-indigo-500/30 blur-3xl"></div>
        <div class="absolute inset-0 bg-[radial-gradient(circle,rgba(255,255,255,0.5)_1px,transparent_1px)] bg-[length:28px_28px] opacity-20"></div>

        <div class="container-x relative">
            <div x-data="{ active: 0, total: {{ max($heroSlides->count(), 1) }} }"
                 x-init="if (total > 1) setInterval(() => active = (active + 1) % total, 6500)"
                 class="grid items-center gap-12 py-20 lg:grid-cols-2 lg:py-28">

                {{-- Copy --}}
                <div class="text-white">
                    @forelse ($heroSlides as $i => $slide)
                        <div x-show="active === {{ $i }}" x-transition.opacity.duration.700ms @if (! $loop->first) style="display:none" @endif>
                            @if ($slide->eyebrow)
                                <span class="inline-flex items-center gap-2 rounded-full bg-white/10 px-4 py-1.5 text-xs font-semibold uppercase tracking-wider text-brand-100 ring-1 ring-white/15">
                                    <span class="h-1.5 w-1.5 rounded-full bg-brand-300"></span>{{ $slide->eyebrow }}
                                </span>
                            @endif
                            <h1 class="mt-6 font-display text-3xl font-extrabold leading-[1.1] tracking-tight sm:text-4xl lg:text-5xl">
                                {{ $slide->title }}
                            </h1>
                            @if ($slide->subtitle)
                                <p class="mt-3 font-display text-xl font-semibold text-brand-200">{{ $slide->subtitle }}</p>
                            @endif
                            @if ($slide->description)
                                <p class="mt-5 max-w-xl text-base leading-relaxed text-slate-300">{{ $slide->description }}</p>
                            @endif
                            <div class="mt-8 flex flex-wrap gap-3">
                                @if ($slide->primary_label)
                                    <a href="{{ $slide->primary_url ?: route('contact') }}" class="btn-primary group px-6 py-3">
                                        {{ $slide->primary_label }} <x-icon name="arrow-right" class="h-4 w-4 transition-transform duration-300 group-hover:translate-x-1" />
                                    </a>
                                @endif
                                @if ($slide->secondary_label)
                                    <a href="{{ $slide->secondary_url ?: route('services.index') }}"
                                       class="inline-flex items-center gap-2 rounded-xl border border-white/25 bg-white/5 px-6 py-3 text-sm font-semibold text-white transition hover:bg-white/10">
                                        {{ $slide->secondary_label }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    @empty
                        <div>
                            <span class="inline-flex items-center gap-2 rounded-full bg-white/10 px-4 py-1.5 text-xs font-semibold uppercase tracking-wider text-brand-100 ring-1 ring-white/15">
                                <span class="h-1.5 w-1.5 rounded-full bg-brand-300"></span>{{ $siteSetting->company_name }}
                            </span>
                            <h1 class="mt-6 font-display text-3xl font-extrabold leading-[1.1] tracking-tight sm:text-4xl lg:text-5xl">
                                {{ $siteSetting->tagline ?: 'Solusi transformasi bisnis anda.' }}
                            </h1>
                            <p class="mt-5 max-w-xl text-base leading-relaxed text-slate-300">{{ $siteSetting->description }}</p>
                            <div class="mt-8 flex flex-wrap gap-3">
                                <a href="{{ route('contact') }}" class="btn-primary group px-6 py-3">Get Started <x-icon name="arrow-right" class="h-4 w-4 transition-transform duration-300 group-hover:translate-x-1" /></a>
                                <a href="{{ route('services.index') }}" class="inline-flex items-center gap-2 rounded-xl border border-white/25 bg-white/5 px-6 py-3 text-sm font-semibold text-white transition hover:bg-white/10">Our Services</a>
                            </div>
                        </div>
                    @endforelse

                    @if ($heroSlides->count() > 1)
                        <div class="mt-10 flex gap-2">
                            @foreach ($heroSlides as $i => $slide)
                                <button type="button" @click="active = {{ $i }}"
                                        class="h-1.5 rounded-full transition-all"
                                        :class="active === {{ $i }} ? 'w-8 bg-brand-300' : 'w-3 bg-white/30'"
                                        aria-label="Slide {{ $i + 1 }}"></button>
                            @endforeach
                        </div>
                    @endif
                </div>

                {{-- Hero image — fixed static illustration, independent of the company profile upload --}}
                <div class="relative hidden lg:block">
                    <img src="{{ asset('images/hero.png') }}" alt="Solusi transformasi digital {{ $siteSetting->company_name }}"
                         class="edge-fade animate-fade-up mx-auto w-full max-w-xl">
                </div>
            </div>
        </div>

        {{-- wave separator --}}
        <div class="relative">
            <svg class="block w-full text-slate-50" viewBox="0 0 1440 60" fill="none" preserveAspectRatio="none">
                <path d="M0 60V20c240 30 480 30 720 0s480-30 720 0v40H0z" fill="currentColor"/>
            </svg>
        </div>
    </section>

    {{-- ============================= TRANSFORMASI ============================= --}}
    <section class="bg-slate-50 py-16 lg:py-20">
        <div class="container-x grid items-center gap-12 lg:grid-cols-2">
            <div class="reveal reveal-left">
                <x-section-heading eyebrow="Transformasi Bisnis"
                    title="Saatnya melakukan gebrakan untuk bisnis Anda" />
                <p class="mt-5 leading-relaxed text-slate-500">
                    Persaingan di dunia bisnis yang semakin ketat membuat perusahaan harus bisa melakukan &ldquo;gebrakan&rdquo; agar tetap satu arah dengan perkembangan pasar. Salah satu langkah yang dapat diambil untuk menghindari kerugian adalah melakukan <span class="font-semibold text-slate-700">transformasi</span>.
                </p>
            </div>
            <div class="reveal reveal-right space-y-4">
                @foreach ([
                    'Berhenti menggunakan solusi teknologi yang tidak tepat',
                    'Tentukan partner yang tepat dan lakukan kolaborasi',
                    'Sederhanakan pencapaian yang ingin dituju, dan lakukan secara bertahap',
                ] as $i => $step)
                    <div class="flex items-start gap-4 rounded-2xl border border-slate-100 bg-white p-5 shadow-sm transition hover:-translate-y-0.5 hover:shadow-md">
                        <span class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-brand-600 font-display text-sm font-extrabold text-white">{{ sprintf('%02d', $i + 1) }}</span>
                        <p class="pt-2 text-sm font-medium leading-relaxed text-slate-700">{{ $step }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ============================= ABOUT ============================= --}}
    <section class="bg-white py-16 lg:py-20">
        <div class="container-x grid items-center gap-12 lg:grid-cols-2">
            <div class="reveal reveal-left relative">
                <div class="aspect-[3/2] overflow-hidden rounded-3xl bg-gradient-to-br from-brand-600 to-indigo-800 shadow-xl">
                    @if ($profile->image)
                        <img src="{{ asset('storage/'.$profile->image) }}" alt="Tentang EFEA" class="h-full w-full object-cover">
                    @else
                        <div class="flex h-full w-full items-center justify-center text-white/90">
                            <x-icon name="building" class="h-24 w-24 opacity-40" />
                        </div>
                    @endif
                </div>
                <div class="absolute -right-4 -top-4 hidden rounded-2xl bg-white p-4 shadow-lg sm:block">
                    <div class="flex items-center gap-2 text-brand-600"><x-icon name="rocket" class="h-6 w-6" /><span class="font-display font-bold text-slate-900">Business Transformation</span></div>
                </div>
            </div>
            <div class="reveal reveal-right">
                <x-section-heading eyebrow="Tentang Kami" title="Partner transformasi digital untuk bisnis Anda" />
                <p class="mt-5 leading-relaxed text-slate-500">{{ \Illuminate\Support\Str::limit($profile->about, 320) }}</p>

                <div class="mt-6 grid gap-4 sm:grid-cols-2">
                    @if ($profile->vision)
                        <div class="rounded-2xl border border-slate-100 bg-slate-50 p-5">
                            <div class="flex items-center gap-2 text-brand-600"><x-icon name="eye" class="h-5 w-5" /><span class="font-display font-bold text-slate-900">Visi</span></div>
                            <p class="mt-2 text-sm text-slate-500">{{ \Illuminate\Support\Str::limit($profile->vision, 140) }}</p>
                        </div>
                    @endif
                    @if ($profile->mission)
                        <div class="rounded-2xl border border-slate-100 bg-slate-50 p-5">
                            <div class="flex items-center gap-2 text-brand-600"><x-icon name="check-circle" class="h-5 w-5" /><span class="font-display font-bold text-slate-900">Misi</span></div>
                            <p class="mt-2 text-sm text-slate-500">{{ \Illuminate\Support\Str::limit($profile->mission, 140) }}</p>
                        </div>
                    @endif
                </div>
                <a href="{{ route('about') }}" class="btn-outline mt-7 px-6 py-3">Selengkapnya tentang kami</a>
            </div>
        </div>
    </section>

    {{-- ============================= SERVICES ============================= --}}
    @if ($services->isNotEmpty())
        <section class="bg-slate-50 py-16 lg:py-20">
            <div class="container-x">
                <div class="reveal mx-auto max-w-2xl">
                    <x-section-heading center eyebrow="Layanan Kami"
                        title="Solusi teknologi menyeluruh"
                        subtitle="Dari konsultasi hingga implementasi — kami membantu setiap tahap transformasi digital perusahaan Anda." />
                </div>
                <div class="reveal mt-10 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
                    @foreach ($services as $service)
                        <x-service-card :service="$service" />
                    @endforeach
                </div>
                <div class="mt-10 text-center">
                    <a href="{{ route('services.index') }}" class="btn-primary group px-6 py-3">Lihat Semua Layanan <x-icon name="arrow-right" class="h-4 w-4 transition-transform duration-300 group-hover:translate-x-1" /></a>
                </div>
            </div>
        </section>
    @endif

    {{-- ============================= WHY US ============================= --}}
    @if ($features->isNotEmpty())
        <section class="relative overflow-hidden bg-slate-950 py-20 text-white lg:py-24">
            <div class="absolute inset-0 bg-gradient-to-br from-brand-800 to-indigo-950"></div>
            <div class="absolute -right-24 top-0 h-72 w-72 animate-float-slow rounded-full bg-brand-500/20 blur-3xl"></div>
            <div class="container-x relative">
                <div class="reveal mx-auto max-w-2xl text-center">
                    <span class="inline-block rounded-full bg-white/10 px-3 py-1 text-xs font-semibold uppercase tracking-wider text-brand-100 ring-1 ring-white/15">Mengapa Memilih Kami</span>
                    <h2 class="mt-3 font-display text-3xl font-extrabold sm:text-4xl">Keunggulan yang membedakan kami</h2>
                </div>
                <div class="reveal mt-10 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
                    @foreach ($features as $feature)
                        <div class="rounded-2xl border border-white/10 bg-white/5 p-6 backdrop-blur transition hover:bg-white/10">
                            <span class="flex h-12 w-12 items-center justify-center rounded-xl bg-brand-500/20 text-brand-200">
                                <x-icon :name="$feature->icon ?: 'shield-check'" class="h-6 w-6" />
                            </span>
                            <h3 class="mt-5 font-display text-lg font-bold text-white">{{ $feature->title }}</h3>
                            <p class="mt-2 text-sm leading-relaxed text-slate-300">{{ $feature->description }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- ============================= PORTFOLIO ============================= --}}
    @if ($projects->isNotEmpty())
        <section class="bg-white py-16 lg:py-20">
            <div class="container-x" x-data="{ cat: 'all' }">
                <div class="reveal flex flex-col gap-6 sm:flex-row sm:items-end sm:justify-between">
                    <x-section-heading eyebrow="Portofolio" title="Karya & proyek pilihan kami" />
                    <div class="flex flex-wrap gap-2">
                        @foreach (['all' => 'Semua'] + array_combine(\App\Models\Project::CATEGORIES, \App\Models\Project::CATEGORIES) as $value => $label)
                            <button type="button" @click="cat = '{{ $value }}'"
                                    class="rounded-full border px-4 py-1.5 text-sm font-semibold transition"
                                    :class="cat === '{{ $value }}' ? 'border-brand-600 bg-brand-600 text-white' : 'border-slate-200 text-slate-600 hover:border-brand-300'">
                                {{ $label }}
                            </button>
                        @endforeach
                    </div>
                </div>
                <div class="reveal mt-10 grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
                    @foreach ($projects as $project)
                        <div x-show="cat === 'all' || cat === '{{ $project->category }}'" x-transition>
                            <x-project-card :project="$project" />
                        </div>
                    @endforeach
                </div>
                <div class="mt-10 text-center">
                    <a href="{{ route('projects.index') }}" class="btn-outline px-6 py-3">Lihat Semua Portofolio</a>
                </div>
            </div>
        </section>
    @endif

    {{-- ============================= TEAM ============================= --}}
    @if ($team->isNotEmpty())
        <section class="bg-slate-50 py-16 lg:py-20">
            <div class="container-x">
                <div class="reveal mx-auto max-w-2xl">
                    <x-section-heading center eyebrow="Tim Kami" title="Dipimpin oleh para profesional" subtitle="Tim berpengalaman yang berkomitmen menghadirkan solusi terbaik." />
                </div>
                <div class="reveal mt-10 grid gap-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-6">
                    @foreach ($team as $member)
                        <x-team-card :member="$member" />
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- ============================= ARTICLES ============================= --}}
    @if ($articles->isNotEmpty())
        <section class="bg-white py-16 lg:py-20">
            <div class="container-x">
                <div class="reveal flex flex-col gap-6 sm:flex-row sm:items-end sm:justify-between">
                    <x-section-heading eyebrow="Artikel" title="Wawasan & berita terbaru" />
                    <a href="{{ route('articles.index') }}" class="btn-ghost group">Semua artikel <x-icon name="arrow-right" class="h-4 w-4 transition-transform duration-300 group-hover:translate-x-1" /></a>
                </div>
                <div class="reveal mt-10 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
                    @foreach ($articles as $article)
                        <x-article-card :article="$article" />
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- ============================= CONTACT / CTA ============================= --}}
    <section id="kontak" class="bg-slate-50 py-16 lg:py-20">
        <div class="container-x grid gap-10 lg:grid-cols-2">
            <div class="reveal reveal-left">
                <x-section-heading eyebrow="Hubungi Kami" title="Mari mulai transformasi bisnis Anda"
                    subtitle="Konsultasikan kebutuhan teknologi perusahaan Anda bersama tim EFEA. Kami siap membantu." />
                <div class="mt-8 space-y-4">
                    @if ($siteSetting->address)
                        <div class="flex items-start gap-4">
                            <span class="flex h-11 w-11 items-center justify-center rounded-xl bg-brand-50 text-brand-600"><x-icon name="map-pin" class="h-5 w-5" /></span>
                            <div><p class="font-semibold text-slate-900">Alamat</p><p class="text-sm text-slate-500">{{ $siteSetting->address }}</p></div>
                        </div>
                    @endif
                    @if ($siteSetting->phone)
                        <div class="flex items-start gap-4">
                            <span class="flex h-11 w-11 items-center justify-center rounded-xl bg-brand-50 text-brand-600"><x-icon name="phone" class="h-5 w-5" /></span>
                            <div><p class="font-semibold text-slate-900">Telepon</p><a href="tel:{{ $siteSetting->phone }}" class="text-sm text-slate-500 hover:text-brand-600">{{ $siteSetting->phone }}</a></div>
                        </div>
                    @endif
                    @if ($siteSetting->email)
                        <div class="flex items-start gap-4">
                            <span class="flex h-11 w-11 items-center justify-center rounded-xl bg-brand-50 text-brand-600"><x-icon name="mail" class="h-5 w-5" /></span>
                            <div><p class="font-semibold text-slate-900">Email</p><a href="mailto:{{ $siteSetting->email }}" class="text-sm text-slate-500 hover:text-brand-600">{{ $siteSetting->email }}</a></div>
                        </div>
                    @endif
                </div>
            </div>
            <div class="reveal reveal-right rounded-3xl border border-slate-100 bg-white p-6 shadow-sm sm:p-8">
                <x-contact-form />
            </div>
        </div>
    </section>
</x-public-layout>
