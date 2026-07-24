<x-admin-layout title="Edit Team member">
    <x-admin.page-header title="Edit Team member" subtitle="Update this team member." />

    <div class="admin-card mx-auto max-w-3xl p-6 sm:p-8">
        <form method="POST" action="{{ route('admin.team.update', $member) }}" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')
            @include('admin.team._form')
            <div class="flex items-center justify-end gap-3 border-t border-slate-100 pt-6">
                <a href="{{ route('admin.team.index') }}" class="btn-outline px-5 py-2.5 text-sm">Cancel</a>
                <button type="submit" class="btn-primary px-5 py-2.5 text-sm">Save changes</button>
            </div>
        </form>
    </div>
</x-admin-layout>
