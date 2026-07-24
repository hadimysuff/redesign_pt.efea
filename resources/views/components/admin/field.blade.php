@props([
    'name',
    'label',
    'type' => 'text',
    'value' => null,
    'required' => false,
    'placeholder' => null,
    'help' => null,
])

<div>
    <label for="{{ $name }}" class="form-label">
        {{ $label }}@if ($required)<span class="text-red-500"> *</span>@endif
    </label>
    <input
        type="{{ $type }}"
        name="{{ $name }}"
        id="{{ $name }}"
        value="{{ old($name, $value) }}"
        @if ($placeholder) placeholder="{{ $placeholder }}" @endif
        @if ($required) required @endif
        {{ $attributes->class(['form-input', 'border-red-400 focus:border-red-500 focus:ring-red-500' => $errors->has($name)]) }}
    >
    @if ($help)
        <p class="mt-1 text-xs text-slate-400">{{ $help }}</p>
    @endif
    @error($name)
        <p class="form-error">{{ $message }}</p>
    @enderror
</div>
