<x-public-layout :title="$article->title">
    <x-page-banner :title="$article->title"
                   :breadcrumb="[['label' => 'Artikel', 'url' => route('articles.index')], ['label' => \Illuminate\Support\Str::limit($article->title, 40)]]" />

    <article class="bg-white py-20 lg:py-24">
        <div class="container-x mx-auto max-w-3xl">
            <div class="flex items-center gap-3 text-sm text-slate-400">
                <span class="inline-flex items-center gap-1"><x-icon name="clock" class="h-4 w-4" /> {{ optional($article->published_at)->translatedFormat('d F Y') }}</span>
                @if ($article->author)<span>· oleh {{ $article->author }}</span>@endif
            </div>

            @if ($article->cover_image)
                <img src="{{ asset('storage/'.$article->cover_image) }}" alt="{{ $article->title }}"
                     class="mt-6 aspect-[16/9] w-full rounded-3xl object-cover shadow-sm">
            @endif

            @if ($article->excerpt)
                <p class="mt-8 text-lg font-medium leading-relaxed text-slate-600">{{ $article->excerpt }}</p>
            @endif

            <div class="prose prose-slate mt-6 max-w-none leading-relaxed text-slate-600">
                {!! nl2br(e($article->body)) !!}
            </div>

            <div class="mt-10 border-t border-slate-100 pt-6">
                <a href="{{ route('articles.index') }}" class="inline-flex items-center gap-2 text-sm font-semibold text-brand-600 hover:text-brand-700">
                    <x-icon name="arrow-left" class="h-4 w-4" /> Kembali ke Artikel
                </a>
            </div>
        </div>
    </article>

    @if ($recent->isNotEmpty())
        <section class="bg-slate-50 py-20">
            <div class="container-x">
                <x-section-heading eyebrow="Artikel Lainnya" title="Baca juga" />
                <div class="mt-10 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
                    @foreach ($recent as $item)
                        <x-article-card :article="$item" />
                    @endforeach
                </div>
            </div>
        </section>
    @endif
</x-public-layout>
