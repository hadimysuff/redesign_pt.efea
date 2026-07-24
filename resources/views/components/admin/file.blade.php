@props([
    'name',
    'label',
    'current' => null,
    'required' => false,
    'help' => 'JPG, PNG, WEBP, or SVG · max 2MB',
])

<div>
    <label for="{{ $name }}" class="form-label">
        {{ $label }}@if ($required)<span class="text-red-500"> *</span>@endif
    </label>

    @if ($current)
        <div class="mb-3 flex items-center gap-3">
            <img src="{{ asset('storage/'.$current) }}" alt="Current image"
                 class="h-16 w-16 rounded-lg border border-slate-200 object-cover">
            <span class="text-xs text-slate-500">Current image — upload a new one to replace it.</span>
        </div>
    @endif

    <input
        type="file"
        name="{{ $name }}"
        id="{{ $name }}"
        accept="image/*"
        @if ($required && ! $current) required @endif
        {{ $attributes->class([
            'block w-full text-sm text-slate-600 file:mr-4 file:rounded-lg file:border-0 file:bg-brand-50 file:px-4 file:py-2 file:text-sm file:font-semibold file:text-brand-700 hover:file:bg-brand-100',
            'ring-1 ring-red-400 rounded-lg' => $errors->has($name),
        ]) }}
    >
    @if ($help)
        <p class="mt-1 text-xs text-slate-400">{{ $help }}</p>
    @endif
    @error($name)
        <p class="form-error">{{ $message }}</p>
    @enderror
</div>
