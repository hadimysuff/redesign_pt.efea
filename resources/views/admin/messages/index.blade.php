<x-admin-layout title="Messages">
    <x-admin.page-header title="Messages" subtitle="Enquiries submitted through the public contact form.">
        <x-slot:actions>
            <x-admin.search :action="route('admin.messages.index')" :value="$search" placeholder="Search messages…">
                @if ($filter === 'unread')
                    <input type="hidden" name="filter" value="unread">
                @endif
            </x-admin.search>
            <a href="{{ route('admin.messages.index') }}"
               class="{{ $filter !== 'unread' ? 'btn-outline' : 'btn-ghost' }} px-4 py-2 text-sm">All</a>
            <a href="{{ route('admin.messages.index', ['filter' => 'unread']) }}"
               class="{{ $filter === 'unread' ? 'btn-outline' : 'btn-ghost' }} px-4 py-2 text-sm">Unread</a>
        </x-slot:actions>
    </x-admin.page-header>

    <div class="admin-card overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-slate-100 text-sm">
                <thead class="bg-slate-50 text-left text-xs font-semibold uppercase tracking-wide text-slate-500">
                    <tr>
                        <th class="px-5 py-3">From</th>
                        <th class="px-5 py-3">Subject</th>
                        <th class="px-5 py-3">Received</th>
                        <th class="px-5 py-3 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse ($messages as $message)
                        <tr @class(['hover:bg-slate-50', 'bg-brand-50/40' => ! $message->is_read])>
                            <td class="px-5 py-3">
                                <a href="{{ route('admin.messages.show', $message) }}" class="block">
                                    <div class="flex items-center gap-2">
                                        @unless ($message->is_read)
                                            <span class="inline-block h-2 w-2 shrink-0 rounded-full bg-brand-500"></span>
                                        @endunless
                                        <span class="font-semibold text-slate-900">{{ $message->name }}</span>
                                    </div>
                                    <p class="text-xs text-slate-400">{{ $message->email }}</p>
                                </a>
                            </td>
                            <td class="px-5 py-3">
                                <a href="{{ route('admin.messages.show', $message) }}" class="block text-slate-600">
                                    {{ \Illuminate\Support\Str::limit($message->subject ?: $message->message, 70) }}
                                </a>
                            </td>
                            <td class="px-5 py-3 text-slate-500">{{ $message->created_at->diffForHumans() }}</td>
                            <td class="px-5 py-3">
                                <div class="flex items-center justify-end gap-1">
                                    <a href="{{ route('admin.messages.show', $message) }}"
                                       class="rounded-lg p-2 text-slate-400 transition hover:bg-brand-50 hover:text-brand-600" title="View">
                                        <x-icon name="eye" class="h-5 w-5" />
                                    </a>
                                    <x-admin.confirm-delete :action="route('admin.messages.destroy', $message)" title="Delete this message?" />
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-5 py-12 text-center text-slate-400">
                                No messages found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if ($messages->hasPages())
            <div class="border-t border-slate-100 px-5 py-3">{{ $messages->links() }}</div>
        @endif
    </div>
</x-admin-layout>
