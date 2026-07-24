@props(['service'])

<a href="{{ route('services.show', $service) }}"
   class="group relative flex flex-col rounded-2xl border border-slate-100 bg-white p-6 shadow-sm transition hover:-translate-y-1 hover:border-brand-200 hover:shadow-lg">
    <span class="flex h-12 w-12 items-center justify-center rounded-xl bg-brand-50 text-brand-600 transition group-hover:bg-brand-600 group-hover:text-white">
        <x-icon :name="$service->icon ?: 'cog'" class="h-6 w-6" />
    </span>
    <h3 class="mt-5 font-display text-lg font-bold text-slate-900">{{ $service->title }}</h3>
    <p class="mt-2 flex-1 text-sm leading-relaxed text-slate-500">
        {{ \Illuminate\Support\Str::limit($service->excerpt ?: strip_tags($service->description), 120) }}
    </p>
    <span class="mt-4 inline-flex items-center gap-1 text-sm font-semibold text-brand-600">
        Selengkapnya <x-icon name="arrow-right" class="h-4 w-4 transition group-hover:translate-x-1" />
    </span>
</a>
