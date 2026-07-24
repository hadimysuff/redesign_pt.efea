<x-admin-layout title="Services">
    <x-admin.page-header title="Services" subtitle="The IT services offered by EFEA (Layanan).">
        <x-slot:actions>
            <x-admin.search :action="route('admin.services.index')" :value="$search" placeholder="Search…" />
            <a href="{{ route('admin.services.create') }}" class="btn-primary px-4 py-2.5 text-sm">
                <x-icon name="plus" class="h-4 w-4" /> New service
            </a>
        </x-slot:actions>
    </x-admin.page-header>

    <div class="admin-card overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-slate-100 text-sm">
                <thead class="bg-slate-50 text-left text-xs font-semibold uppercase tracking-wide text-slate-500">
                    <tr>
                        <th class="px-5 py-3">Service</th>
                        <th class="px-5 py-3">Order</th>
                        <th class="px-5 py-3">Status</th>
                        <th class="px-5 py-3 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse ($services as $service)
                        <tr class="hover:bg-slate-50">
                            <td class="px-5 py-3">
                                <div class="flex items-center gap-3">
                                    @if ($service->image)
                                        <img src="{{ asset('storage/'.$service->image) }}" alt="" class="h-11 w-16 rounded-lg object-cover">
                                    @else
                                        <span class="flex h-11 w-16 items-center justify-center rounded-lg bg-gradient-to-br from-brand-500 to-indigo-600 text-white">
                                            <x-icon name="cog" class="h-5 w-5" />
                                        </span>
                                    @endif
                                    <div class="min-w-0">
                                        <p class="font-semibold text-slate-900">{{ $service->title }}</p>
                                        <p class="truncate text-xs text-slate-400">{{ $service->slug }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-5 py-3 text-slate-500">{{ $service->sort_order }}</td>
                            <td class="px-5 py-3">
                                @if ($service->is_active)
                                    <span class="badge bg-emerald-100 text-emerald-700">Active</span>
                                @else
                                    <span class="badge bg-slate-100 text-slate-500">Hidden</span>
                                @endif
                            </td>
                            <td class="px-5 py-3">
                                <div class="flex items-center justify-end gap-1">
                                    <a href="{{ route('admin.services.edit', $service) }}"
                                       class="rounded-lg p-2 text-slate-400 transition hover:bg-brand-50 hover:text-brand-600" title="Edit">
                                        <x-icon name="pencil" class="h-5 w-5" />
                                    </a>
                                    <x-admin.confirm-delete :action="route('admin.services.destroy', $service)" title="Delete Service?" />
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-5 py-12 text-center text-slate-400">
                                No services yet.
                                <a href="{{ route('admin.services.create') }}" class="font-semibold text-brand-600">Create one</a>.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if ($services->hasPages())
            <div class="border-t border-slate-100 px-5 py-3">{{ $services->links() }}</div>
        @endif
    </div>
</x-admin-layout>
