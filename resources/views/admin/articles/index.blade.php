<x-admin-layout title="Articles">
    <x-admin.page-header title="Articles" subtitle="News & blog posts (Berita/Artikel).">
        <x-slot:actions>
            <x-admin.search :action="route('admin.articles.index')" :value="$search" placeholder="Search…" />
            <a href="{{ route('admin.articles.create') }}" class="btn-primary px-4 py-2.5 text-sm">
                <x-icon name="plus" class="h-4 w-4" /> New article
            </a>
        </x-slot:actions>
    </x-admin.page-header>

    <div class="admin-card overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-slate-100 text-sm">
                <thead class="bg-slate-50 text-left text-xs font-semibold uppercase tracking-wide text-slate-500">
                    <tr>
                        <th class="px-5 py-3">Article</th>
                        <th class="px-5 py-3">Status</th>
                        <th class="px-5 py-3">Published</th>
                        <th class="px-5 py-3 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse ($articles as $article)
                        <tr class="hover:bg-slate-50">
                            <td class="px-5 py-3">
                                <div class="flex items-center gap-3">
                                    @if ($article->cover_image)
                                        <img src="{{ asset('storage/'.$article->cover_image) }}" alt="" class="h-11 w-16 rounded-lg object-cover">
                                    @else
                                        <span class="flex h-11 w-16 items-center justify-center rounded-lg bg-gradient-to-br from-brand-500 to-indigo-600 text-white">
                                            <x-icon name="newspaper" class="h-5 w-5" />
                                        </span>
                                    @endif
                                    <div class="min-w-0">
                                        <p class="font-semibold text-slate-900">{{ $article->title }}</p>
                                        <p class="truncate text-xs text-slate-400">{{ $article->author }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-5 py-3">
                                @if ($article->is_published)
                                    <span class="badge bg-emerald-100 text-emerald-700">Published</span>
                                @else
                                    <span class="badge bg-slate-100 text-slate-500">Draft</span>
                                @endif
                            </td>
                            <td class="px-5 py-3 text-slate-500">{{ $article->published_at?->format('d M Y') ?? '—' }}</td>
                            <td class="px-5 py-3">
                                <div class="flex items-center justify-end gap-1">
                                    <a href="{{ route('admin.articles.edit', $article) }}"
                                       class="rounded-lg p-2 text-slate-400 transition hover:bg-brand-50 hover:text-brand-600" title="Edit">
                                        <x-icon name="pencil" class="h-5 w-5" />
                                    </a>
                                    <x-admin.confirm-delete :action="route('admin.articles.destroy', $article)" title="Delete Article (News)?" />
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-5 py-12 text-center text-slate-400">
                                No articles yet.
                                <a href="{{ route('admin.articles.create') }}" class="font-semibold text-brand-600">Create one</a>.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if ($articles->hasPages())
            <div class="border-t border-slate-100 px-5 py-3">{{ $articles->links() }}</div>
        @endif
    </div>
</x-admin-layout>
