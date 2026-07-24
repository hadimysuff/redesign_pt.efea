<div class="grid gap-5 sm:grid-cols-2">
    <div class="sm:col-span-2">
        <x-admin.field name="title" label="Title" :value="$article->title" required />
    </div>
    <x-admin.field name="slug" label="Slug" :value="$article->slug" help="Leave blank to auto-generate from the title." />
    <x-admin.field name="author" label="Author" :value="$article->author" />
    <x-admin.field name="published_at" label="Publish date" type="datetime-local"
                   :value="$article->published_at?->format('Y-m-d\TH:i')"
                   help="Leave blank to use the current time when published." />
    <div class="flex items-end pb-2">
        <x-admin.toggle name="is_published" label="Published" :checked="$article->is_published ?? false" />
    </div>

    <div class="sm:col-span-2">
        <x-admin.textarea name="excerpt" label="Excerpt" :value="$article->excerpt" rows="2" />
    </div>
    <div class="sm:col-span-2">
        <x-admin.textarea name="body" label="Body" :value="$article->body" rows="12" required />
    </div>

    <div class="sm:col-span-2">
        <x-admin.file name="cover_image" label="Cover image" :current="$article->cover_image" />
    </div>
</div>
