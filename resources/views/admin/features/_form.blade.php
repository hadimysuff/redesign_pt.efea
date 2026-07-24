<div class="grid gap-5 sm:grid-cols-2">
    <div class="sm:col-span-2">
        <x-admin.field name="title" label="Title" :value="$feature->title" required />
    </div>
    <x-admin.field name="icon" label="Icon name" :value="$feature->icon"
                   placeholder="shield-check, star, rocket, check…"
                   help="Name from the icon set (e.g. shield-check, star, rocket)." />
    <x-admin.field name="sort_order" label="Sort order" type="number" min="0" :value="$feature->sort_order ?? 0" />
    <div class="sm:col-span-2">
        <x-admin.textarea name="description" label="Description" :value="$feature->description" rows="3" />
    </div>
</div>
