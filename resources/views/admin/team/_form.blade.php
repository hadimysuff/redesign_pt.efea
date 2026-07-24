<div class="grid gap-5 sm:grid-cols-2">
    <div class="sm:col-span-2">
        <x-admin.field name="name" label="Name" :value="$member->name" required />
    </div>
    <x-admin.field name="position" label="Position / role" :value="$member->position" />
    <x-admin.field name="email" label="Email" type="email" :value="$member->email" />
    <x-admin.field name="linkedin_url" label="LinkedIn URL" type="url" :value="$member->linkedin_url" placeholder="https://linkedin.com/in/…" />

    <div class="sm:col-span-2">
        <x-admin.textarea name="bio" label="Short bio" :value="$member->bio" rows="3" />
    </div>

    <x-admin.field name="sort_order" label="Sort order" type="number" min="0" :value="$member->sort_order ?? 0" />

    <div class="sm:col-span-2">
        <x-admin.file name="photo" label="Photo" :current="$member->photo" />
    </div>
</div>
