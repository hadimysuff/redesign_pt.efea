<x-public-layout title="Artikel">
    <x-page-banner title="Artikel & Berita"
                   subtitle="Wawasan, tips, dan berita terbaru seputar teknologi informasi dan transformasi bisnis."
                   :breadcrumb="[['label' => 'Artikel']]" />

    <section class="bg-white py-20 lg:py-24">
        <div class="container-x">
            @if ($articles->isNotEmpty())
                <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
                    @foreach ($articles as $article)
                        <x-article-card :article="$article" />
                    @endforeach
                </div>
                <div class="mt-12">{{ $articles->links() }}</div>
            @else
                <p class="text-center text-slate-400">Belum ada artikel yang dipublikasikan.</p>
            @endif
        </div>
    </section>
</x-public-layout>
