@props(['project'])

<a href="{{ route('projects.show', $project) }}"
   class="group overflow-hidden rounded-2xl border border-slate-100 bg-white shadow-sm transition hover:-translate-y-1 hover:shadow-lg">
    <div class="relative aspect-[16/10] overflow-hidden">
        @if ($project->image)
            <img src="{{ asset('storage/'.$project->image) }}" alt="{{ $project->title }}"
                 class="h-full w-full object-cover transition duration-500 group-hover:scale-105">
        @else
            <div class="flex h-full w-full items-center justify-center bg-gradient-to-br from-brand-500 to-indigo-600 text-white">
                <x-icon name="briefcase" class="h-10 w-10 opacity-70" />
            </div>
        @endif
        <span class="badge absolute left-3 top-3 bg-white/90 text-brand-700 backdrop-blur">{{ $project->category }}</span>
    </div>
    <div class="p-5">
        <h3 class="font-display font-bold text-slate-900 transition group-hover:text-brand-700">{{ $project->title }}</h3>
        <p class="mt-1 text-sm text-slate-400">
            {{ $project->client }}@if ($project->client && $project->year) · @endif{{ $project->year }}
        </p>
    </div>
</a>
