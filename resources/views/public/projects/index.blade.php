<x-public-layout title="Portofolio">
    <x-page-banner title="Portofolio"
                   subtitle="Beragam proyek yang telah kami kerjakan bersama klien dari berbagai industri."
                   :breadcrumb="[['label' => 'Portofolio']]" />

    <section class="bg-white py-20 lg:py-24">
        <div class="container-x">
            {{-- Category filter --}}
            <div class="mb-10 flex flex-wrap justify-center gap-2">
                <a href="{{ route('projects.index') }}"
                   @class([
                       'rounded-full border px-4 py-1.5 text-sm font-semibold transition',
                       'border-brand-600 bg-brand-600 text-white' => $category === '',
                       'border-slate-200 text-slate-600 hover:border-brand-300' => $category !== '',
                   ])>Semua</a>
                @foreach ($categories as $cat)
                    <a href="{{ route('projects.index', ['category' => $cat]) }}"
                       @class([
                           'rounded-full border px-4 py-1.5 text-sm font-semibold transition',
                           'border-brand-600 bg-brand-600 text-white' => $category === $cat,
                           'border-slate-200 text-slate-600 hover:border-brand-300' => $category !== $cat,
                       ])>{{ $cat }}</a>
                @endforeach
            </div>

            @if ($projects->isNotEmpty())
                <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
                    @foreach ($projects as $project)
                        <x-project-card :project="$project" />
                    @endforeach
                </div>
            @else
                <p class="text-center text-slate-400">Belum ada proyek pada kategori ini.</p>
            @endif
        </div>
    </section>

    <x-cta-banner />
</x-public-layout>
