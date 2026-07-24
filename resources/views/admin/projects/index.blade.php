<x-admin-layout title="Projects">
    <x-admin.page-header title="Projects" subtitle="Portfolio entries (Portofolio/Project).">
        <x-slot:actions>
            <x-admin.search :action="route('admin.projects.index')" :value="$search" placeholder="Search…" />
            <a href="{{ route('admin.projects.create') }}" class="btn-primary px-4 py-2.5 text-sm">
                <x-icon name="plus" class="h-4 w-4" /> New
            </a>
        </x-slot:actions>
    </x-admin.page-header>

    <div class="admin-card overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-slate-100 text-sm">
                <thead class="bg-slate-50 text-left text-xs font-semibold uppercase tracking-wide text-slate-500">
                    <tr>
                        <th class="px-5 py-3">Project</th>
                        <th class="px-5 py-3">Category</th>
                        <th class="px-5 py-3">Year</th>
                        <th class="px-5 py-3">Featured</th>
                        <th class="px-5 py-3 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse ($projects as $project)
                        <tr class="hover:bg-slate-50">
                            <td class="px-5 py-3">
                                <div class="flex items-center gap-3">
                                    @if ($project->image)
                                        <img src="{{ asset('storage/'.$project->image) }}" alt="" class="h-11 w-16 rounded-lg object-cover">
                                    @else
                                        <span class="flex h-11 w-16 items-center justify-center rounded-lg bg-gradient-to-br from-brand-500 to-indigo-600 text-white">
                                            <x-icon name="photo" class="h-5 w-5" />
                                        </span>
                                    @endif
                                    <div class="min-w-0">
                                        <p class="font-semibold text-slate-900">{{ $project->title }}</p>
                                        <p class="truncate text-xs text-slate-400">{{ \Illuminate\Support\Str::limit($project->client, 60) }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-5 py-3">
                                <span class="badge bg-brand-50 text-brand-700">{{ $project->category }}</span>
                            </td>
                            <td class="px-5 py-3 text-slate-500">{{ $project->year }}</td>
                            <td class="px-5 py-3">
                                @if ($project->is_featured)
                                    <span class="badge bg-amber-100 text-amber-700">
                                        <x-icon name="star" class="h-4 w-4" /> Featured
                                    </span>
                                @else
                                    <span class="text-slate-300">—</span>
                                @endif
                            </td>
                            <td class="px-5 py-3">
                                <div class="flex items-center justify-end gap-1">
                                    <a href="{{ route('admin.projects.edit', $project) }}"
                                       class="rounded-lg p-2 text-slate-400 transition hover:bg-brand-50 hover:text-brand-600" title="Edit">
                                        <x-icon name="pencil" class="h-5 w-5" />
                                    </a>
                                    <x-admin.confirm-delete :action="route('admin.projects.destroy', $project)" title="Delete Project (Portfolio)?" />
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-5 py-12 text-center text-slate-400">
                                No projects yet.
                                <a href="{{ route('admin.projects.create') }}" class="font-semibold text-brand-600">Create one</a>.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if ($projects->hasPages())
            <div class="border-t border-slate-100 px-5 py-3">{{ $projects->links() }}</div>
        @endif
    </div>
</x-admin-layout>
