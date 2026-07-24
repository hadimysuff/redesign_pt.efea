<x-admin-layout title="Dashboard">
    <x-admin.page-header title="Welcome back, {{ auth()->user()->name }} 👋"
                         subtitle="Here's what's happening across the EFEA website." />

    {{-- Stat cards --}}
    @php
        $cards = [
            ['label' => 'Services', 'value' => $stats['services'], 'icon' => 'cog', 'route' => 'admin.services.index', 'tint' => 'bg-brand-50 text-brand-600'],
            ['label' => 'Projects', 'value' => $stats['projects'], 'icon' => 'briefcase', 'route' => 'admin.projects.index', 'tint' => 'bg-indigo-50 text-indigo-600'],
            ['label' => 'Articles', 'value' => $stats['articles'], 'icon' => 'newspaper', 'route' => 'admin.articles.index', 'tint' => 'bg-emerald-50 text-emerald-600'],
            ['label' => 'Team members', 'value' => $stats['team'], 'icon' => 'users', 'route' => 'admin.team.index', 'tint' => 'bg-amber-50 text-amber-600'],
        ];
    @endphp

    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 xl:grid-cols-4">
        @foreach ($cards as $card)
            <a href="{{ route($card['route']) }}" class="admin-card group p-5 transition hover:-translate-y-0.5 hover:shadow-md">
                <div class="flex items-center justify-between">
                    <span class="flex h-11 w-11 items-center justify-center rounded-xl {{ $card['tint'] }}">
                        <x-icon :name="$card['icon']" class="h-6 w-6" />
                    </span>
                    <x-icon name="arrow-right" class="h-4 w-4 text-slate-300 transition group-hover:text-brand-500" />
                </div>
                <p class="mt-4 font-display text-3xl font-bold text-slate-900">{{ $card['value'] }}</p>
                <p class="text-sm text-slate-500">{{ $card['label'] }}</p>
            </a>
        @endforeach
    </div>

    <div class="mt-4 grid grid-cols-1 gap-4 lg:grid-cols-3">
        {{-- Messages inbox summary --}}
        <div class="admin-card lg:col-span-2">
            <div class="flex items-center justify-between border-b border-slate-100 px-5 py-4">
                <div class="flex items-center gap-2">
                    <h3 class="font-display font-bold text-slate-900">Recent messages</h3>
                    @if ($stats['unread'] > 0)
                        <span class="badge bg-red-100 text-red-700">{{ $stats['unread'] }} unread</span>
                    @endif
                </div>
                <a href="{{ route('admin.messages.index') }}" class="text-sm font-semibold text-brand-600 hover:text-brand-700">View all</a>
            </div>
            <ul class="divide-y divide-slate-100">
                @forelse ($recentMessages as $message)
                    <li>
                        <a href="{{ route('admin.messages.show', $message) }}" class="flex items-center gap-4 px-5 py-3.5 hover:bg-slate-50">
                            <span class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-slate-100 text-sm font-semibold text-slate-600">
                                {{ strtoupper(substr($message->name, 0, 1)) }}
                            </span>
                            <div class="min-w-0 flex-1">
                                <p class="flex items-center gap-2 text-sm font-semibold text-slate-900">
                                    {{ $message->name }}
                                    @unless ($message->is_read)<span class="h-2 w-2 rounded-full bg-brand-500"></span>@endunless
                                </p>
                                <p class="truncate text-sm text-slate-500">{{ $message->subject ?: $message->message }}</p>
                            </div>
                            <span class="shrink-0 text-xs text-slate-400">{{ $message->created_at->diffForHumans() }}</span>
                        </a>
                    </li>
                @empty
                    <li class="px-5 py-10 text-center text-sm text-slate-400">No messages yet.</li>
                @endforelse
            </ul>
        </div>

        {{-- Quick actions + recent articles --}}
        <div class="space-y-4">
            <div class="admin-card p-5">
                <h3 class="font-display font-bold text-slate-900">Quick actions</h3>
                <div class="mt-3 grid grid-cols-2 gap-2">
                    <a href="{{ route('admin.services.create') }}" class="btn-outline justify-start px-3 py-2 text-xs"><x-icon name="plus" class="h-4 w-4" /> Service</a>
                    <a href="{{ route('admin.projects.create') }}" class="btn-outline justify-start px-3 py-2 text-xs"><x-icon name="plus" class="h-4 w-4" /> Project</a>
                    <a href="{{ route('admin.articles.create') }}" class="btn-outline justify-start px-3 py-2 text-xs"><x-icon name="plus" class="h-4 w-4" /> Article</a>
                    <a href="{{ route('admin.hero-slides.create') }}" class="btn-outline justify-start px-3 py-2 text-xs"><x-icon name="plus" class="h-4 w-4" /> Slide</a>
                </div>
            </div>

            <div class="admin-card">
                <div class="flex items-center justify-between border-b border-slate-100 px-5 py-4">
                    <h3 class="font-display font-bold text-slate-900">Recent articles</h3>
                    <a href="{{ route('admin.articles.index') }}" class="text-sm font-semibold text-brand-600 hover:text-brand-700">View all</a>
                </div>
                <ul class="divide-y divide-slate-100">
                    @forelse ($recentArticles as $article)
                        <li class="flex items-center justify-between gap-3 px-5 py-3">
                            <a href="{{ route('admin.articles.edit', $article) }}" class="min-w-0 flex-1 truncate text-sm font-medium text-slate-700 hover:text-brand-600">{{ $article->title }}</a>
                            @if ($article->is_published)
                                <span class="badge bg-emerald-100 text-emerald-700">Published</span>
                            @else
                                <span class="badge bg-slate-100 text-slate-500">Draft</span>
                            @endif
                        </li>
                    @empty
                        <li class="px-5 py-8 text-center text-sm text-slate-400">No articles yet.</li>
                    @endforelse
                </ul>
            </div>
        </div>
    </div>
</x-admin-layout>
