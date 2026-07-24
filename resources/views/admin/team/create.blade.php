<x-admin-layout title="New Team member">
    <x-admin.page-header title="New Team member" subtitle="Add a member to the team section." />

    <div class="admin-card mx-auto max-w-3xl p-6 sm:p-8">
        <form method="POST" action="{{ route('admin.team.store') }}" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @include('admin.team._form')
            <div class="flex items-center justify-end gap-3 border-t border-slate-100 pt-6">
                <a href="{{ route('admin.team.index') }}" class="btn-outline px-5 py-2.5 text-sm">Cancel</a>
                <button type="submit" class="btn-primary px-5 py-2.5 text-sm">Create member</button>
            </div>
        </form>
    </div>
</x-admin-layout>
