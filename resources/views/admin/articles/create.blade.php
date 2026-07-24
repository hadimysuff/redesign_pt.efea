<x-admin-layout title="New Article (News)">
    <x-admin.page-header title="New Article (News)" subtitle="Add a news post or blog article." />

    <div class="admin-card mx-auto max-w-3xl p-6 sm:p-8">
        <form method="POST" action="{{ route('admin.articles.store') }}" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @include('admin.articles._form')
            <div class="flex items-center justify-end gap-3 border-t border-slate-100 pt-6">
                <a href="{{ route('admin.articles.index') }}" class="btn-outline px-5 py-2.5 text-sm">Cancel</a>
                <button type="submit" class="btn-primary px-5 py-2.5 text-sm">Create article</button>
            </div>
        </form>
    </div>
</x-admin-layout>
