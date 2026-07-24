<x-admin-layout title="New Feature (Why Choose Us)">
    <x-admin.page-header title="New Feature (Why Choose Us)" subtitle="Add a reason shown in the homepage Why Choose Us section." />

    <div class="admin-card mx-auto max-w-3xl p-6 sm:p-8">
        <form method="POST" action="{{ route('admin.features.store') }}" class="space-y-6">
            @csrf
            @include('admin.features._form')
            <div class="flex items-center justify-end gap-3 border-t border-slate-100 pt-6">
                <a href="{{ route('admin.features.index') }}" class="btn-outline px-5 py-2.5 text-sm">Cancel</a>
                <button type="submit" class="btn-primary px-5 py-2.5 text-sm">Create feature</button>
            </div>
        </form>
    </div>
</x-admin-layout>
