<div class="grid gap-5 sm:grid-cols-2">
    <div class="sm:col-span-2">
        <x-admin.field name="title" label="Title" :value="$project->title" required />
    </div>
    <x-admin.field name="slug" label="Slug" :value="$project->slug" help="Leave blank to auto-generate from the title." />
    <x-admin.select name="category" label="Category" :options="\App\Models\Project::CATEGORIES" :selected="$project->category ?? 'Aplikasi'" required />

    <x-admin.field name="client" label="Client" :value="$project->client" />
    <x-admin.field name="year" label="Year" type="number" min="1990" max="2100" :value="$project->year" />

    <x-admin.field name="url" label="Project URL" type="url" :value="$project->url" placeholder="https://…" />
    <x-admin.field name="sort_order" label="Sort order" type="number" min="0" :value="$project->sort_order ?? 0" />

    <div class="sm:col-span-2">
        <x-admin.textarea name="description" label="Description" :value="$project->description" rows="4" />
    </div>

    <div class="flex items-end pb-2">
        <x-admin.toggle name="is_featured" label="Featured project" :checked="$project->is_featured ?? false" />
    </div>

    <div class="sm:col-span-2">
        <x-admin.file name="image" label="Cover image" :current="$project->image" />
    </div>
</div>
