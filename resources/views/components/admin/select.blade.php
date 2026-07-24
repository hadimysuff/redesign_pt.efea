@props([
    'name',
    'label',
    'options' => [],
    'selected' => null,
    'required' => false,
    'placeholder' => null,
    'help' => null,
])

<div>
    <label for="{{ $name }}" class="form-label">
        {{ $label }}@if ($required)<span class="text-red-500"> *</span>@endif
    </label>
    <select
        name="{{ $name }}"
        id="{{ $name }}"
        @if ($required) required @endif
        {{ $attributes->class(['form-select', 'border-red-400 focus:border-red-500 focus:ring-red-500' => $errors->has($name)]) }}
    >
        @if ($placeholder)
            <option value="">{{ $placeholder }}</option>
        @endif
        @foreach ($options as $key => $optionLabel)
            @php($optionValue = is_int($key) ? $optionLabel : $key)
            <option value="{{ $optionValue }}" @selected((string) old($name, $selected) === (string) $optionValue)>
                {{ $optionLabel }}
            </option>
        @endforeach
    </select>
    @if ($help)
        <p class="mt-1 text-xs text-slate-400">{{ $help }}</p>
    @endif
    @error($name)
        <p class="form-error">{{ $message }}</p>
    @enderror
</div>
