@props([
    'title' => 'Siap bertransformasi bersama kami?',
    'subtitle' => 'Konsultasikan kebutuhan teknologi informasi perusahaan Anda bersama tim EFEA hari ini.',
])

<section class="bg-white py-16">
    <div class="container-x">
        <div class="relative overflow-hidden rounded-3xl bg-gradient-to-br from-brand-700 to-indigo-900 px-6 py-14 text-center text-white shadow-xl sm:px-12">
            <div class="absolute -left-16 -top-16 h-64 w-64 rounded-full bg-white/10 blur-3xl"></div>
            <div class="absolute -bottom-20 -right-10 h-64 w-64 rounded-full bg-brand-400/20 blur-3xl"></div>
            <div class="relative">
                <h2 class="font-display text-3xl font-extrabold sm:text-4xl">{{ $title }}</h2>
                <p class="mx-auto mt-3 max-w-xl text-slate-300">{{ $subtitle }}</p>
                <div class="mt-8 flex flex-wrap justify-center gap-3">
                    <a href="{{ route('contact') }}" class="inline-flex items-center gap-2 rounded-xl bg-white px-6 py-3 text-sm font-semibold text-brand-700 shadow-sm transition hover:bg-brand-50">
                        Hubungi Kami <x-icon name="arrow-right" class="h-4 w-4" />
                    </a>
                    <a href="{{ route('services.index') }}" class="inline-flex items-center gap-2 rounded-xl border border-white/30 px-6 py-3 text-sm font-semibold text-white transition hover:bg-white/10">
                        Lihat Layanan
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
