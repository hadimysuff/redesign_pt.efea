@props(['article'])

<a href="{{ route('articles.show', $article) }}"
   class="group flex flex-col overflow-hidden rounded-2xl border border-slate-100 bg-white shadow-sm transition hover:-translate-y-1 hover:shadow-lg">
    <div class="aspect-[16/9] overflow-hidden">
        @if ($article->cover_image)
            <img src="{{ asset('storage/'.$article->cover_image) }}" alt="{{ $article->title }}"
                 class="h-full w-full object-cover transition duration-500 group-hover:scale-105">
        @else
            <div class="flex h-full w-full items-center justify-center bg-gradient-to-br from-slate-700 to-slate-900 text-white">
                <x-icon name="newspaper" class="h-10 w-10 opacity-60" />
            </div>
        @endif
    </div>
    <div class="flex flex-1 flex-col p-5">
        <div class="flex items-center gap-2 text-xs text-slate-400">
            <x-icon name="clock" class="h-4 w-4" />
            <span>{{ optional($article->published_at)->translatedFormat('d M Y') }}</span>
            @if ($article->author)<span>· {{ $article->author }}</span>@endif
        </div>
        <h3 class="mt-2 font-display text-lg font-bold text-slate-900 transition group-hover:text-brand-700">{{ $article->title }}</h3>
        <p class="mt-2 flex-1 text-sm leading-relaxed text-slate-500">{{ \Illuminate\Support\Str::limit($article->excerpt, 110) }}</p>
        <span class="mt-3 inline-flex items-center gap-1 text-sm font-semibold text-brand-600">
            Baca artikel <x-icon name="arrow-right" class="h-4 w-4 transition group-hover:translate-x-1" />
        </span>
    </div>
</a>
