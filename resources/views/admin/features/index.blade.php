<x-admin-layout title="Why Choose Us">
    <x-admin.page-header title="Why Choose Us" subtitle='Reasons highlighted on the homepage ("Mengapa memilih kami").'>
        <x-slot:actions>
            <x-admin.search :action="route('admin.features.index')" :value="$search" placeholder="Search…" />
            <a href="{{ route('admin.features.create') }}" class="btn-primary px-4 py-2.5 text-sm">
                <x-icon name="plus" class="h-4 w-4" /> New
            </a>
        </x-slot:actions>
    </x-admin.page-header>

    <div class="admin-card overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-slate-100 text-sm">
                <thead class="bg-slate-50 text-left text-xs font-semibold uppercase tracking-wide text-slate-500">
                    <tr>
                        <th class="px-5 py-3">Feature</th>
                        <th class="px-5 py-3">Description</th>
                        <th class="px-5 py-3">Order</th>
                        <th class="px-5 py-3 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse ($features as $feature)
                        <tr class="hover:bg-slate-50">
                            <td class="px-5 py-3">
                                <div class="min-w-0">
                                    <p class="font-semibold text-slate-900">{{ $feature->title }}</p>
                                    <p class="truncate text-xs text-slate-400">{{ $feature->icon }}</p>
                                </div>
                            </td>
                            <td class="px-5 py-3 text-slate-500">{{ \Illuminate\Support\Str::limit($feature->description, 80) }}</td>
                            <td class="px-5 py-3 text-slate-500">{{ $feature->sort_order }}</td>
                            <td class="px-5 py-3">
                                <div class="flex items-center justify-end gap-1">
                                    <a href="{{ route('admin.features.edit', $feature) }}"
                                       class="rounded-lg p-2 text-slate-400 transition hover:bg-brand-50 hover:text-brand-600" title="Edit">
                                        <x-icon name="pencil" class="h-5 w-5" />
                                    </a>
                                    <x-admin.confirm-delete :action="route('admin.features.destroy', $feature)" title="Delete Feature (Why Choose Us)?" />
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-5 py-12 text-center text-slate-400">
                                No features yet.
                                <a href="{{ route('admin.features.create') }}" class="font-semibold text-brand-600">Create one</a>.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if ($features->hasPages())
            <div class="border-t border-slate-100 px-5 py-3">{{ $features->links() }}</div>
        @endif
    </div>
</x-admin-layout>
