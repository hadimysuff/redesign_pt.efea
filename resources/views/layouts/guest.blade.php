@php($logo = \App\Models\SiteSetting::current()->logo)
<!DOCTYPE html>
<html lang="id" class="h-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }} — Admin</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700&family=plus-jakarta-sans:600,700,800&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="h-full bg-slate-50 font-sans text-slate-700 antialiased">
    <div class="min-h-screen lg:grid lg:grid-cols-12">

        {{-- ===== Brand panel (left) ===== --}}
        <div class="relative hidden overflow-hidden bg-slate-950 p-12 lg:col-span-5 lg:flex lg:flex-col lg:justify-between xl:p-16">
            <div class="absolute inset-0 bg-gradient-to-br from-brand-700 via-brand-800 to-indigo-950"></div>
            <div class="absolute -left-24 top-10 h-72 w-72 rounded-full bg-brand-500/30 blur-3xl"></div>
            <div class="absolute -right-16 bottom-0 h-80 w-80 rounded-full bg-indigo-500/30 blur-3xl"></div>
            <div class="absolute inset-0 bg-[radial-gradient(circle,rgba(255,255,255,0.5)_1px,transparent_1px)] bg-[length:26px_26px] opacity-20"></div>

            {{-- logo --}}
            <a href="{{ route('home') }}" class="relative flex items-center gap-2.5">
                @if ($logo)
                    <img src="{{ asset('storage/'.$logo) }}" alt="EFEA" class="h-9 w-auto brightness-0 invert">
                @else
                    <span class="flex h-10 w-10 items-center justify-center rounded-xl bg-white font-display text-lg font-extrabold text-brand-700">E</span>
                    <span class="font-display text-lg font-extrabold text-white">EFEA</span>
                @endif
            </a>

            {{-- headline --}}
            <div class="relative text-white">
                
                <h2 class="mt-6 font-display text-4xl font-extrabold leading-tight xl:text-5xl">
                    Manajemen Konten Terpadu.
                </h2>
                <p class="mt-4 max-w-md text-base font-light leading-relaxed text-slate-300">
                    Kendalikan seluruh informasi dan layanan website EFEA dari satu dashboard.
                </p>
                <div class="mt-8 h-1 w-16 rounded-full bg-white/40"></div>
            </div>

            {{-- footer --}}
            <p class="relative text-xs text-slate-400">
                &copy; {{ date('Y') }} PT Efea Inovasi Solusi · Your Digital Transformation Partner
            </p>
        </div>

        {{-- ===== Form panel (right) ===== --}}
        <div class="flex min-h-screen items-center justify-center px-4 py-12 sm:px-6 lg:col-span-7">
            <div class="w-full max-w-md">
                {{-- mobile logo --}}
                <a href="{{ route('home') }}" class="mb-8 flex items-center justify-center gap-2.5 lg:hidden">
                    @if ($logo)
                        <img src="{{ asset('storage/'.$logo) }}" alt="EFEA" class="h-9 w-auto">
                    @else
                        <span class="flex h-10 w-10 items-center justify-center rounded-xl bg-brand-600 font-display text-lg font-extrabold text-white">E</span>
                        <span class="font-display text-lg font-extrabold text-slate-900">EFEA</span>
                    @endif
                </a>

                <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm sm:p-8">
                    {{ $slot }}
                </div>

                <a href="{{ route('home') }}" class="mt-6 flex items-center justify-center gap-2 text-sm font-medium text-slate-500 transition hover:text-brand-600">
                    <x-icon name="arrow-left" class="h-4 w-4" /> Kembali ke situs
                </a>
            </div>
        </div>
    </div>
</body>
</html>
