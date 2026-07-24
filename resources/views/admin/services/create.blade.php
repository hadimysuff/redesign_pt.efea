<x-admin-layout title="New Service">
    <x-admin.page-header title="New Service" subtitle="Add a service to the EFEA offerings." />

    <div class="admin-card mx-auto max-w-3xl p-6 sm:p-8">
        <form method="POST" action="{{ route('admin.services.store') }}" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @include('admin.services._form')
            <div class="flex items-center justify-end gap-3 border-t border-slate-100 pt-6">
                <a href="{{ route('admin.services.index') }}" class="btn-outline px-5 py-2.5 text-sm">Cancel</a>
                <button type="submit" class="btn-primary px-5 py-2.5 text-sm">Create service</button>
            </div>
        </form>
    </div>
</x-admin-layout>
