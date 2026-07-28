<div class="grid gap-5 sm:grid-cols-2">
    <div class="sm:col-span-2">
        <x-admin.field name="title" label="Title" :value="$slide->title" required
                       placeholder="Solusi transformasi bisnis anda." />
    </div>
    <x-admin.field name="eyebrow" label="Eyebrow" :value="$slide->eyebrow" placeholder="Small label above the title" />
    <x-admin.field name="subtitle" label="Subtitle" :value="$slide->subtitle" />
    <div class="sm:col-span-2">
        <x-admin.textarea name="description" label="Description" :value="$slide->description" rows="3" />
    </div>

    <x-admin.field name="primary_label" label="Primary button label" :value="$slide->primary_label" placeholder="Get Started" />
    <x-admin.field name="primary_url" label="Primary button URL" :value="$slide->primary_url" placeholder="#contact" />
    <x-admin.field name="secondary_label" label="Secondary button label" :value="$slide->secondary_label" placeholder="Our Services" />
    <x-admin.field name="secondary_url" label="Secondary button URL" :value="$slide->secondary_url" placeholder="#services" />

    <x-admin.field name="sort_order" label="Sort order" type="number" min="0" :value="$slide->sort_order ?? 0" />
    <div class="flex items-end pb-2">
        <x-admin.toggle name="is_active" label="Active (visible on the site)" :checked="$slide->is_active ?? true" />
    </div>

    {{-- <div class="sm:col-span-2">
        <x-admin.file name="image" label="Background image" :current="$slide->image" />
    </div> --}}
</div>
