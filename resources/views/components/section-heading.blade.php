@props([
    'eyebrow' => null,
    'title',
    'subtitle' => null,
    'center' => false,
])

<div @class(['max-w-2xl', 'mx-auto text-center' => $center])>
    @if ($eyebrow)
        <span class="inline-block rounded-full bg-brand-50 px-3 py-1 text-xs font-semibold uppercase tracking-wider text-brand-700">{{ $eyebrow }}</span>
    @endif
    <h2 class="mt-3 font-display text-3xl font-extrabold tracking-tight text-slate-900 sm:text-4xl">{{ $title }}</h2>
    @if ($subtitle)
        <p class="mt-4 text-lg leading-relaxed text-slate-500">{{ $subtitle }}</p>
    @endif
</div>
