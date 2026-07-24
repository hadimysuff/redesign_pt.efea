@props([
    'title',
    'subtitle' => null,
    'breadcrumb' => [],
])

<section class="relative overflow-hidden bg-slate-950 pt-16 lg:pt-20">
    <div class="absolute inset-0 bg-gradient-to-br from-brand-700 via-brand-800 to-indigo-950"></div>
    <div class="absolute -right-16 top-0 h-72 w-72 rounded-full bg-brand-500/25 blur-3xl"></div>
    <div class="absolute inset-0 bg-[radial-gradient(circle,rgba(255,255,255,0.45)_1px,transparent_1px)] bg-[length:26px_26px] opacity-20"></div>

    <div class="container-x relative py-16 text-white lg:py-20">
        <nav class="flex items-center gap-2 text-sm text-brand-200">
            <a href="{{ route('home') }}" class="hover:text-white">Home</a>
            @foreach ($breadcrumb as $crumb)
                <span class="text-white/40">/</span>
                @if (! empty($crumb['url']))
                    <a href="{{ $crumb['url'] }}" class="hover:text-white">{{ $crumb['label'] }}</a>
                @else
                    <span class="text-white/80">{{ $crumb['label'] }}</span>
                @endif
            @endforeach
        </nav>
        <h1 class="mt-4 font-display text-3xl font-extrabold tracking-tight sm:text-4xl lg:text-5xl">{{ $title }}</h1>
        @if ($subtitle)
            <p class="mt-4 max-w-2xl text-lg leading-relaxed text-slate-300">{{ $subtitle }}</p>
        @endif
    </div>

    <div class="relative">
        <svg class="block w-full text-white" viewBox="0 0 1440 48" fill="none" preserveAspectRatio="none">
            <path d="M0 48V16c240 24 480 24 720 0s480-24 720 0v32H0z" fill="currentColor"/>
        </svg>
    </div>
</section>
