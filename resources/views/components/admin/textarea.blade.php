@props([
    'name',
    'label',
    'value' => null,
    'rows' => 4,
    'required' => false,
    'placeholder' => null,
    'help' => null,
])

<div>
    <label for="{{ $name }}" class="form-label">
        {{ $label }}@if ($required)<span class="text-red-500"> *</span>@endif
    </label>
    <textarea
        name="{{ $name }}"
        id="{{ $name }}"
        rows="{{ $rows }}"
        @if ($placeholder) placeholder="{{ $placeholder }}" @endif
        @if ($required) required @endif
        {{ $attributes->class(['form-textarea', 'border-red-400 focus:border-red-500 focus:ring-red-500' => $errors->has($name)]) }}
    >{{ old($name, $value) }}</textarea>
    @if ($help)
        <p class="mt-1 text-xs text-slate-400">{{ $help }}</p>
    @endif
    @error($name)
        <p class="form-error">{{ $message }}</p>
    @enderror
</div>
