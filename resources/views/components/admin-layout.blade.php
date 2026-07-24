@props(['title' => 'Dashboard'])

@php
    $unreadMessages = \App\Models\ContactMessage::where('is_read', false)->count();
    $logo = \App\Models\SiteSetting::current()->logo;

    $navSections = [
        'Overview' => [
            ['route' => 'admin.dashboard', 'active' => 'admin.dashboard', 'icon' => 'dashboard', 'label' => 'Dashboard'],
        ],
        'Content' => [
            ['route' => 'admin.hero-slides.index', 'active' => 'admin.hero-slides.*', 'icon' => 'photo', 'label' => 'Hero Slides'],
            ['route' => 'admin.company-profile.edit', 'active' => 'admin.company-profile.*', 'icon' => 'building', 'label' => 'Company Profile'],
            ['route' => 'admin.features.index', 'active' => 'admin.features.*', 'icon' => 'star', 'label' => 'Why Choose Us'],
            ['route' => 'admin.services.index', 'active' => 'admin.services.*', 'icon' => 'cog', 'label' => 'Services'],
            ['route' => 'admin.projects.index', 'active' => 'admin.projects.*', 'icon' => 'briefcase', 'label' => 'Projects'],
            ['route' => 'admin.articles.index', 'active' => 'admin.articles.*', 'icon' => 'newspaper', 'label' => 'Articles'],
            ['route' => 'admin.team.index', 'active' => 'admin.team.*', 'icon' => 'users', 'label' => 'Team'],
        ],
        'Communication' => [
            ['route' => 'admin.messages.index', 'active' => 'admin.messages.*', 'icon' => 'mail', 'label' => 'Messages', 'badge' => $unreadMessages],
        ],
        'Configuration' => [
            ['route' => 'admin.site-settings.edit', 'active' => 'admin.site-settings.*', 'icon' => 'settings', 'label' => 'Site Settings'],
        ],
    ];
@endphp

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title }} · Admin — {{ config('app.name') }}</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700&family=plus-jakarta-sans:600,700,800&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="h-full bg-slate-100 font-sans text-slate-800 antialiased">
<div x-data="{ sidebarOpen: false }" class="min-h-full">

    {{-- Mobile overlay --}}
    <div x-show="sidebarOpen" x-transition.opacity @click="sidebarOpen = false"
         class="fixed inset-0 z-30 bg-slate-900/50 lg:hidden" style="display:none"></div>

    {{-- Sidebar --}}
    <aside
        class="fixed inset-y-0 left-0 z-40 flex w-72 flex-col border-r border-slate-200 bg-white transition-transform duration-200 lg:translate-x-0"
        :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'">
        <div class="flex h-16 items-center border-b border-slate-200 px-6">
            <a href="{{ route('admin.dashboard') }}" class="flex flex-col justify-center">
                @if ($logo)
                    <img src="{{ asset('storage/'.$logo) }}" alt="EFEA" class="h-7 w-auto">
                @else
                    <span class="font-display text-lg font-extrabold text-slate-900">EFEA</span>
                @endif
                <span class="mt-0.5 text-[10px] font-semibold uppercase tracking-wider text-brand-600">Admin Panel</span>
            </a>
        </div>

        <nav class="flex-1 space-y-6 overflow-y-auto px-4 py-6">
            @foreach ($navSections as $section => $items)
                <div>
                    <p class="px-3 pb-2 text-xs font-semibold uppercase tracking-wider text-slate-400">{{ $section }}</p>
                    <ul class="space-y-1">
                        @foreach ($items as $item)
                            @php($isActive = request()->routeIs($item['active']))
                            <li>
                                <a href="{{ route($item['route']) }}"
                                   @class([
                                       'group flex items-center gap-3 rounded-lg px-3 py-2 text-sm font-medium transition',
                                       'bg-brand-50 text-brand-700' => $isActive,
                                       'text-slate-600 hover:bg-slate-50 hover:text-slate-900' => ! $isActive,
                                   ])>
                                    <x-icon :name="$item['icon']" @class([
                                        'h-5 w-5',
                                        'text-brand-600' => $isActive,
                                        'text-slate-400 group-hover:text-slate-600' => ! $isActive,
                                    ]) />
                                    <span class="flex-1">{{ $item['label'] }}</span>
                                    @if (! empty($item['badge']))
                                        <span class="badge bg-red-100 text-red-700">{{ $item['badge'] }}</span>
                                    @endif
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endforeach
        </nav>
    </aside>

    {{-- Content --}}
    <div class="lg:pl-72">
        {{-- Topbar --}}
        <header class="sticky top-0 z-20 flex h-16 items-center gap-4 border-b border-slate-200 bg-white/90 px-4 backdrop-blur sm:px-6">
            <button @click="sidebarOpen = true" class="btn-ghost -ml-2 lg:hidden" aria-label="Open menu">
                <x-icon name="menu" />
            </button>

            <h1 class="font-display text-lg font-bold text-slate-900">{{ $title }}</h1>

            <div class="ml-auto flex items-center gap-2">
                <a href="{{ route('home') }}" target="_blank" class="btn-ghost hidden sm:inline-flex">
                    <x-icon name="external" class="h-4 w-4" /> View site
                </a>

                <div x-data="{ open: false }" class="relative">
                    <button @click="open = ! open" @click.outside="open = false"
                            class="flex items-center gap-2 rounded-lg px-2 py-1.5 text-sm font-medium text-slate-700 hover:bg-slate-100">
                        <span class="flex h-8 w-8 items-center justify-center rounded-full bg-brand-600 text-sm font-semibold text-white">
                            {{ strtoupper(substr(auth()->user()->name ?? 'A', 0, 1)) }}
                        </span>
                        <span class="hidden sm:block">{{ auth()->user()->name }}</span>
                        <x-icon name="chevron-down" class="h-4 w-4 text-slate-400" />
                    </button>
                    <div x-show="open" x-transition style="display:none"
                         class="absolute right-0 mt-2 w-48 overflow-hidden rounded-xl border border-slate-200 bg-white py-1 shadow-lg">
                        <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-sm text-slate-700 hover:bg-slate-50">Profile</a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="flex w-full items-center gap-2 px-4 py-2 text-left text-sm text-red-600 hover:bg-red-50">
                                <x-icon name="logout" class="h-4 w-4" /> Log out
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </header>

        {{-- Flash messages --}}
        @if (session('success') || session('error'))
            <div class="px-4 pt-6 sm:px-6 lg:px-8">
                @if (session('success'))
                    <div class="flex items-center gap-3 rounded-xl border border-green-200 bg-green-50 px-4 py-3 text-sm text-green-800">
                        <x-icon name="check-circle" class="h-5 w-5 shrink-0 text-green-600" />
                        <span>{{ session('success') }}</span>
                    </div>
                @endif
                @if (session('error'))
                    <div class="flex items-center gap-3 rounded-xl border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-800">
                        <x-icon name="x-mark" class="h-5 w-5 shrink-0 text-red-600" />
                        <span>{{ session('error') }}</span>
                    </div>
                @endif
            </div>
        @endif

        <main class="px-4 py-6 sm:px-6 lg:px-8">
            {{ $slot }}
        </main>
    </div>
</div>
</body>
</html>
