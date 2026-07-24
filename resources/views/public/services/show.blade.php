<x-public-layout :title="$service->title">
    <x-page-banner :title="$service->title"
                   :subtitle="$service->excerpt"
                   :breadcrumb="[['label' => 'Layanan', 'url' => route('services.index')], ['label' => $service->title]]" />

    <section class="bg-white py-20 lg:py-24">
        <div class="container-x grid gap-12 lg:grid-cols-3">
            {{-- Main --}}
            <div class="lg:col-span-2">
                @if ($service->image)
                    <img src="{{ asset('storage/'.$service->image) }}" alt="{{ $service->title }}"
                         class="mb-8 aspect-[16/9] w-full rounded-3xl object-cover shadow-sm">
                @else
                    <div class="mb-8 flex aspect-[16/9] w-full items-center justify-center rounded-3xl bg-gradient-to-br from-brand-600 to-indigo-800 text-white">
                        <x-icon :name="$service->icon ?: 'cog'" class="h-20 w-20 opacity-50" />
                    </div>
                @endif

                <div class="prose prose-slate max-w-none leading-relaxed text-slate-600">
                    {!! nl2br(e($service->description ?: $service->excerpt)) !!}
                </div>
            </div>

            {{-- Sidebar --}}
            <aside class="space-y-6">
                @if ($others->isNotEmpty())
                    <div class="rounded-2xl border border-slate-100 bg-slate-50 p-6">
                        <h3 class="font-display font-bold text-slate-900">Layanan Lainnya</h3>
                        <ul class="mt-4 space-y-2">
                            @foreach ($others as $other)
                                <li>
                                    <a href="{{ route('services.show', $other) }}"
                                       class="flex items-center gap-3 rounded-xl bg-white px-4 py-3 text-sm font-medium text-slate-700 shadow-sm transition hover:text-brand-600">
                                        <x-icon :name="$other->icon ?: 'cog'" class="h-5 w-5 text-brand-500" />
                                        <span class="flex-1">{{ $other->title }}</span>
                                        <x-icon name="arrow-right" class="h-4 w-4 text-slate-300" />
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="rounded-2xl bg-gradient-to-br from-brand-700 to-indigo-900 p-6 text-white">
                    <h3 class="font-display text-lg font-bold">Butuh layanan ini?</h3>
                    <p class="mt-2 text-sm text-slate-300">Diskusikan kebutuhan Anda dengan tim kami secara gratis.</p>
                    <a href="{{ route('contact') }}" class="mt-4 inline-flex items-center gap-2 rounded-xl bg-white px-5 py-2.5 text-sm font-semibold text-brand-700 transition hover:bg-brand-50">
                        Konsultasi <x-icon name="arrow-right" class="h-4 w-4" />
                    </a>
                </div>
            </aside>
        </div>
    </section>
</x-public-layout>
