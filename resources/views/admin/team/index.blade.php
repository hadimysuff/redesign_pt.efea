<x-admin-layout title="Team">
    <x-admin.page-header title="Team" subtitle="Team members shown on the site.">
        <x-slot:actions>
            <x-admin.search :action="route('admin.team.index')" :value="$search" placeholder="Search…" />
            <a href="{{ route('admin.team.create') }}" class="btn-primary px-4 py-2.5 text-sm">
                <x-icon name="plus" class="h-4 w-4" /> New
            </a>
        </x-slot:actions>
    </x-admin.page-header>

    <div class="admin-card overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-slate-100 text-sm">
                <thead class="bg-slate-50 text-left text-xs font-semibold uppercase tracking-wide text-slate-500">
                    <tr>
                        <th class="px-5 py-3">Member</th>
                        <th class="px-5 py-3">Email</th>
                        <th class="px-5 py-3">Order</th>
                        <th class="px-5 py-3 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse ($members as $member)
                        <tr class="hover:bg-slate-50">
                            <td class="px-5 py-3">
                                <div class="flex items-center gap-3">
                                    @if ($member->photo)
                                        <img src="{{ asset('storage/'.$member->photo) }}" alt="" class="h-11 w-11 rounded-full object-cover">
                                    @else
                                        <span class="flex h-11 w-11 items-center justify-center rounded-full bg-gradient-to-br from-brand-500 to-indigo-600 text-sm font-semibold text-white">
                                            {{ strtoupper(substr($member->name, 0, 1)) }}
                                        </span>
                                    @endif
                                    <div class="min-w-0">
                                        <p class="font-semibold text-slate-900">{{ $member->name }}</p>
                                        <p class="truncate text-xs text-slate-400">{{ $member->position }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-5 py-3 text-slate-500">{{ $member->email }}</td>
                            <td class="px-5 py-3 text-slate-500">{{ $member->sort_order }}</td>
                            <td class="px-5 py-3">
                                <div class="flex items-center justify-end gap-1">
                                    <a href="{{ route('admin.team.edit', $member) }}"
                                       class="rounded-lg p-2 text-slate-400 transition hover:bg-brand-50 hover:text-brand-600" title="Edit">
                                        <x-icon name="pencil" class="h-5 w-5" />
                                    </a>
                                    <x-admin.confirm-delete :action="route('admin.team.destroy', $member)" title="Delete Team member?" />
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-5 py-12 text-center text-slate-400">
                                No team members yet.
                                <a href="{{ route('admin.team.create') }}" class="font-semibold text-brand-600">Create one</a>.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if ($members->hasPages())
            <div class="border-t border-slate-100 px-5 py-3">{{ $members->links() }}</div>
        @endif
    </div>
</x-admin-layout>
