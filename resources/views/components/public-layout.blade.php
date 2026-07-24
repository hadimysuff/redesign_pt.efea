@props([
    'title' => null,
    'metaDescription' => null,
])

@php
    $company = $siteSetting->company_name ?? config('app.name');
    $pageTitle = $title ? $title.' — '.$company : $company.' · '.($siteSetting->tagline ?? 'Solusi Transformasi Bisnis');
    $desc = $metaDescription ?? $siteSetting->description ?? 'Penyedia solusi teknologi informasi untuk transformasi bisnis Anda.';

    $navLinks = [
        ['route' => 'home', 'active' => 'home', 'label' => 'Home'],
        ['route' => 'about', 'active' => 'about', 'label' => 'Tentang Kami'],
        ['route' => 'services.index', 'active' => 'services.*', 'label' => 'Layanan'],
        ['route' => 'projects.index', 'active' => 'projects.*', 'label' => 'Portofolio'],
        ['route' => 'articles.index', 'active' => 'articles.*', 'label' => 'Artikel'],
        ['route' => 'contact', 'active' => 'contact', 'label' => 'Kontak'],
    ];
@endphp

<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    {{-- Enable JS-gated motion (scroll reveal) before first paint to avoid FOUC --}}
    <script>document.documentElement.classList.add('js');</script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $pageTitle }}</title>
    <meta name="description" content="{{ $desc }}">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700&family=plus-jakarta-sans:600,700,800&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-white font-sans text-slate-700 antialiased">

    {{-- Navbar --}}
    <header x-data="{ open: false, scrolled: false }"
            @scroll.window="scrolled = (window.pageYOffset > 8)"
            class="fixed inset-x-0 top-0 z-50 transition"
            :class="scrolled ? 'bg-white/90 shadow-sm backdrop-blur border-b border-slate-100' : 'bg-transparent'">
        <nav class="container-x flex h-16 items-center justify-between lg:h-20">
            <a href="{{ route('home') }}" class="flex items-center gap-2.5">
                @if ($siteSetting->logo)
                    {{-- White on the transparent (dark) navbar, original colours once scrolled --}}
                    <img src="{{ asset('storage/'.$siteSetting->logo) }}" alt="{{ $company }}"
                         class="h-8 w-auto brightness-0 invert transition lg:h-9"
                         :class="scrolled && '!filter-none'">
                @else
                    <span class="flex h-10 w-10 items-center justify-center rounded-xl bg-white font-display text-lg font-extrabold text-brand-700 shadow-sm transition"
                          :class="scrolled && '!bg-brand-600 !text-white'">E</span>
                    <span class="font-display text-lg font-extrabold tracking-tight text-white transition"
                          :class="scrolled && '!text-slate-900'">EFEA</span>
                @endif
            </a>

            {{-- Desktop nav --}}
            <div class="hidden items-center gap-1 lg:flex">
                @foreach ($navLinks as $link)
                    @php($isActive = request()->routeIs($link['active']))
                    <a href="{{ route($link['route']) }}"
                       @class([
                           'rounded-lg px-3.5 py-2 text-sm font-semibold transition',
                           'text-white' => $isActive,
                           'text-white/80 hover:text-white' => ! $isActive,
                       ])
                       :class="scrolled && '{{ $isActive ? '!text-brand-700' : '!text-slate-600 hover:!text-brand-700' }}'">
                        {{ $link['label'] }}
                    </a>
                @endforeach
            </div>

            <div class="hidden items-center gap-3 lg:flex">
                <a href="{{ route('contact') }}"
                   class="inline-flex items-center gap-2 rounded-xl bg-white px-5 py-2.5 text-sm font-semibold text-brand-700 shadow-sm transition hover:bg-brand-50"
                   :class="scrolled && '!bg-brand-600 !text-white hover:!bg-brand-700'">Konsultasi Gratis</a>
            </div>

            {{-- Mobile toggle --}}
            <button @click="open = ! open"
                    class="-mr-2 inline-flex items-center justify-center rounded-lg p-2 text-white transition hover:bg-white/10 lg:hidden"
                    :class="scrolled && '!text-slate-700 hover:!bg-slate-100'" aria-label="Menu">
                <x-icon name="menu" class="h-6 w-6" />
            </button>
        </nav>

        {{-- Mobile menu --}}
        <div x-show="open" x-transition x-cloak class="border-t border-slate-100 bg-white lg:hidden">
            <div class="container-x space-y-1 py-4">
                @foreach ($navLinks as $link)
                    <a href="{{ route($link['route']) }}"
                       @class([
                           'block rounded-lg px-3 py-2.5 text-sm font-semibold',
                           'bg-brand-50 text-brand-700' => request()->routeIs($link['active']),
                           'text-slate-700 hover:bg-slate-50' => ! request()->routeIs($link['active']),
                       ])>
                        {{ $link['label'] }}
                    </a>
                @endforeach
                <a href="{{ route('contact') }}" class="btn-primary mt-2 w-full px-5 py-2.5 text-sm">Konsultasi Gratis</a>
            </div>
        </div>
    </header>

    <main>
        {{ $slot }}
    </main>

    {{-- Footer --}}
    <footer class="bg-slate-900 text-slate-400">
        <div class="container-x grid gap-10 py-16 md:grid-cols-2 lg:grid-cols-4">
            <div class="lg:col-span-1">
                <div class="flex items-center gap-2.5">
                    @if ($siteSetting->logo)
                        <img src="{{ asset('storage/'.$siteSetting->logo) }}" alt="{{ $company }}" class="h-9 w-auto brightness-0 invert">
                    @else
                        <span class="flex h-10 w-10 items-center justify-center rounded-xl bg-brand-600 font-display text-lg font-extrabold text-white">E</span>
                        <span class="font-display text-lg font-extrabold text-white">EFEA</span>
                    @endif
                </div>
                <p class="mt-4 text-sm leading-relaxed">
                    {{ \Illuminate\Support\Str::limit($siteSetting->description ?? 'Penyedia solusi teknologi informasi untuk transformasi bisnis Anda.', 160) }}
                </p>
                @if (count($siteSetting->socialLinks()))
                    <div class="mt-5 flex gap-2">
                        @foreach ($siteSetting->socialLinks() as $platform => $url)
                            <a href="{{ $url }}" target="_blank" rel="noopener"
                               class="flex h-9 w-9 items-center justify-center rounded-lg bg-white/5 text-slate-300 transition hover:bg-brand-600 hover:text-white"
                               aria-label="{{ $platform }}">
                                <x-social-icon :platform="$platform" class="h-4 w-4" />
                            </a>
                        @endforeach
                    </div>
                @endif
            </div>

            <div>
                <h4 class="font-display text-sm font-bold uppercase tracking-wider text-white">Navigasi</h4>
                <ul class="mt-4 space-y-2.5 text-sm">
                    <li><a href="{{ route('home') }}" class="transition hover:text-white">Home</a></li>
                    <li><a href="{{ route('about') }}" class="transition hover:text-white">Tentang Kami</a></li>
                    <li><a href="{{ route('services.index') }}" class="transition hover:text-white">Layanan</a></li>
                    <li><a href="{{ route('projects.index') }}" class="transition hover:text-white">Portofolio</a></li>
                    <li><a href="{{ route('articles.index') }}" class="transition hover:text-white">Artikel</a></li>
                </ul>
            </div>

            <div>
                <h4 class="font-display text-sm font-bold uppercase tracking-wider text-white">Kontak</h4>
                <ul class="mt-4 space-y-3 text-sm">
                    @if ($siteSetting->address)
                        <li class="flex gap-3"><x-icon name="map-pin" class="h-5 w-5 shrink-0 text-brand-400" /><span>{{ $siteSetting->address }}</span></li>
                    @endif
                    @if ($siteSetting->phone)
                        <li class="flex gap-3"><x-icon name="phone" class="h-5 w-5 shrink-0 text-brand-400" /><a href="tel:{{ $siteSetting->phone }}" class="hover:text-white">{{ $siteSetting->phone }}</a></li>
                    @endif
                    @if ($siteSetting->email)
                        <li class="flex gap-3"><x-icon name="mail" class="h-5 w-5 shrink-0 text-brand-400" /><a href="mailto:{{ $siteSetting->email }}" class="hover:text-white">{{ $siteSetting->email }}</a></li>
                    @endif
                </ul>
            </div>

            <div>
                <h4 class="font-display text-sm font-bold uppercase tracking-wider text-white">Mulai Sekarang</h4>
                <p class="mt-4 text-sm">Siap bertransformasi? Konsultasikan kebutuhan IT perusahaan Anda bersama tim kami.</p>
                <a href="{{ route('contact') }}" class="btn-primary mt-4 px-5 py-2.5 text-sm">Hubungi Kami</a>
            </div>
        </div>

        <div class="border-t border-white/10">
            <div class="container-x flex flex-col items-center justify-between gap-2 py-6 text-sm sm:flex-row">
                <p>&copy; {{ date('Y') }} {{ $company }}. All rights reserved.</p>
                <p>{{ $siteSetting->footer_text ?? 'Dibuat dengan Laravel & Tailwind CSS.' }}</p>
            </div>
        </div>
    </footer>
</body>
</html>
