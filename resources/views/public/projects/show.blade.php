<x-public-layout :title="$project->title">
    <x-page-banner :title="$project->title"
                   :breadcrumb="[['label' => 'Portofolio', 'url' => route('projects.index')], ['label' => $project->title]]" />

    <section class="bg-white py-20 lg:py-24">
        <div class="container-x grid gap-12 lg:grid-cols-3">
            <div class="lg:col-span-2">
                @if ($project->image)
                    <img src="{{ asset('storage/'.$project->image) }}" alt="{{ $project->title }}"
                         class="mb-8 aspect-[16/9] w-full rounded-3xl object-cover shadow-sm">
                @else
                    <div class="mb-8 flex aspect-[16/9] w-full items-center justify-center rounded-3xl bg-gradient-to-br from-brand-600 to-indigo-800 text-white">
                        <x-icon name="briefcase" class="h-20 w-20 opacity-50" />
                    </div>
                @endif

                <div class="prose prose-slate max-w-none leading-relaxed text-slate-600">
                    {!! nl2br(e($project->description ?: 'Tidak ada deskripsi untuk proyek ini.')) !!}
                </div>
            </div>

            <aside class="space-y-6">
                <div class="rounded-2xl border border-slate-100 bg-slate-50 p-6">
                    <h3 class="font-display font-bold text-slate-900">Detail Proyek</h3>
                    <dl class="mt-4 space-y-3 text-sm">
                        <div class="flex justify-between gap-4"><dt class="text-slate-400">Kategori</dt><dd class="font-medium text-slate-700">{{ $project->category }}</dd></div>
                        @if ($project->client)<div class="flex justify-between gap-4"><dt class="text-slate-400">Klien</dt><dd class="font-medium text-slate-700">{{ $project->client }}</dd></div>@endif
                        @if ($project->year)<div class="flex justify-between gap-4"><dt class="text-slate-400">Tahun</dt><dd class="font-medium text-slate-700">{{ $project->year }}</dd></div>@endif
                    </dl>
                    @if ($project->url)
                        <a href="{{ $project->url }}" target="_blank" rel="noopener" class="btn-primary mt-5 w-full px-4 py-2.5 text-sm">
                            Kunjungi Website <x-icon name="external" class="h-4 w-4" />
                        </a>
                    @endif
                </div>

                @if ($related->isNotEmpty())
                    <div class="rounded-2xl border border-slate-100 bg-white p-6 shadow-sm">
                        <h3 class="font-display font-bold text-slate-900">Proyek Terkait</h3>
                        <ul class="mt-4 space-y-3">
                            @foreach ($related as $rel)
                                <li>
                                    <a href="{{ route('projects.show', $rel) }}" class="flex items-center gap-3 text-sm font-medium text-slate-700 transition hover:text-brand-600">
                                        <span class="flex h-9 w-9 shrink-0 items-center justify-center rounded-lg bg-brand-50 text-brand-500"><x-icon name="briefcase" class="h-4 w-4" /></span>
                                        <span class="flex-1">{{ $rel->title }}</span>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </aside>
        </div>

        <div class="container-x mt-10">
            <a href="{{ route('projects.index') }}" class="inline-flex items-center gap-2 text-sm font-semibold text-brand-600 hover:text-brand-700">
                <x-icon name="arrow-left" class="h-4 w-4" /> Kembali ke Portofolio
            </a>
        </div>
    </section>
</x-public-layout>
