@props([
    'name',
    'label',
    'checked' => false,
    'help' => null,
])

<div>
    <label for="{{ $name }}" class="flex cursor-pointer items-center gap-3">
        {{-- Hidden field guarantees a value is sent when the checkbox is unchecked --}}
        <input type="hidden" name="{{ $name }}" value="0">
        <input
            type="checkbox"
            name="{{ $name }}"
            id="{{ $name }}"
            value="1"
            @checked(old($name, $checked))
            class="h-5 w-5 rounded border-slate-300 text-brand-600 focus:ring-brand-500"
        >
        <span class="text-sm font-medium text-slate-700">{{ $label }}</span>
    </label>
    @if ($help)
        <p class="mt-1 text-xs text-slate-400">{{ $help }}</p>
    @endif
    @error($name)
        <p class="form-error">{{ $message }}</p>
    @enderror
</div>
