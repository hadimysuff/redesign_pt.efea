@props(['action', 'value' => '', 'placeholder' => 'Search…'])

<form method="GET" action="{{ $action }}" class="relative w-full sm:w-72">
    <span class="pointer-events-none absolute inset-y-0 left-3 flex items-center text-slate-400">
        <x-icon name="search" class="h-4 w-4" />
    </span>
    <input type="search" name="search" value="{{ $value }}" placeholder="{{ $placeholder }}"
           class="form-input pl-9">
    {{-- Optional hidden fields (e.g. to preserve an active filter) --}}
    {{ $slot ?? '' }}
</form>
