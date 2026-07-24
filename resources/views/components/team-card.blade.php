@props(['member'])

<div class="group rounded-2xl border border-slate-100 bg-white p-6 text-center shadow-sm transition hover:-translate-y-1 hover:shadow-lg">
    @if ($member->photo)
        <img src="{{ asset('storage/'.$member->photo) }}" alt="{{ $member->name }}"
             class="mx-auto h-24 w-24 rounded-full object-cover ring-4 ring-brand-50">
    @else
        <span class="mx-auto flex h-24 w-24 items-center justify-center rounded-full bg-gradient-to-br from-brand-500 to-indigo-600 font-display text-2xl font-bold text-white ring-4 ring-brand-50">
            {{ $member->initials() }}
        </span>
    @endif
    <h3 class="mt-4 font-display font-bold text-slate-900">{{ $member->name }}</h3>
    <p class="text-sm font-medium text-brand-600">{{ $member->position }}</p>
    @if ($member->bio)
        <p class="mt-2 text-sm text-slate-400">{{ \Illuminate\Support\Str::limit($member->bio, 80) }}</p>
    @endif
    @if ($member->linkedin_url || $member->email)
        <div class="mt-4 flex justify-center gap-2">
            @if ($member->linkedin_url)
                <a href="{{ $member->linkedin_url }}" target="_blank" rel="noopener"
                   class="flex h-8 w-8 items-center justify-center rounded-lg bg-slate-100 text-slate-500 transition hover:bg-brand-600 hover:text-white" aria-label="LinkedIn">
                    <x-social-icon platform="linkedin" class="h-4 w-4" />
                </a>
            @endif
            @if ($member->email)
                <a href="mailto:{{ $member->email }}"
                   class="flex h-8 w-8 items-center justify-center rounded-lg bg-slate-100 text-slate-500 transition hover:bg-brand-600 hover:text-white" aria-label="Email">
                    <x-icon name="mail" class="h-4 w-4" />
                </a>
            @endif
        </div>
    @endif
</div>
