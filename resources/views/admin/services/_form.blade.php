<div class="grid gap-5 sm:grid-cols-2">
    <div class="sm:col-span-2">
        <x-admin.field name="title" label="Title" :value="$service->title" required />
    </div>
    <x-admin.field name="slug" label="Slug" :value="$service->slug" help="Leave blank to auto-generate from the title." />
    <x-admin.field name="icon" label="Icon name" :value="$service->icon" placeholder="cog, code, server, lock, shield-check…" />

    <div class="sm:col-span-2">
        <x-admin.textarea name="excerpt" label="Short excerpt" :value="$service->excerpt" rows="2" />
    </div>
    <div class="sm:col-span-2">
        <x-admin.textarea name="description" label="Full description" :value="$service->description" rows="6" />
    </div>

    <x-admin.field name="sort_order" label="Sort order" type="number" min="0" :value="$service->sort_order ?? 0" />
    <div class="flex items-end pb-2">
        <x-admin.toggle name="is_active" label="Active (visible on the site)" :checked="$service->is_active ?? true" />
    </div>

    <div class="sm:col-span-2">
        <x-admin.file name="image" label="Image / illustration" :current="$service->image" />
    </div>
</div>
