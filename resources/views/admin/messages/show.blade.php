<x-admin-layout title="Message">
    <a href="{{ route('admin.messages.index') }}"
       class="mb-6 inline-flex items-center gap-2 text-sm font-semibold text-slate-500 transition hover:text-brand-600">
        <x-icon name="arrow-left" class="h-4 w-4" /> Back to messages
    </a>

    <div class="admin-card mx-auto max-w-3xl p-6 sm:p-8">
        <div class="border-b border-slate-100 pb-5">
            <h2 class="font-display text-xl font-bold text-slate-900">{{ $message->name }}</h2>
            <p class="mt-1 text-sm font-medium text-slate-600">{{ $message->subject ?: '—' }}</p>
            <p class="mt-1 text-xs text-slate-400">{{ $message->created_at->format('d M Y, H:i') }}</p>
        </div>

        <dl class="grid gap-5 py-5 sm:grid-cols-2">
            <div>
                <dt class="form-label">Email</dt>
                <dd>
                    <a href="mailto:{{ $message->email }}" class="text-sm font-medium text-brand-600 hover:underline">
                        {{ $message->email }}
                    </a>
                </dd>
            </div>
            <div>
                <dt class="form-label">Phone</dt>
                <dd>
                    @if ($message->phone)
                        <a href="tel:{{ $message->phone }}" class="text-sm font-medium text-brand-600 hover:underline">
                            {{ $message->phone }}
                        </a>
                    @else
                        <span class="text-sm text-slate-400">—</span>
                    @endif
                </dd>
            </div>
        </dl>

        <div class="rounded-xl bg-slate-50 p-5 text-sm text-slate-700 whitespace-pre-line">{{ $message->message }}</div>

        <div class="mt-6 flex flex-wrap items-center justify-end gap-3 border-t border-slate-100 pt-6">
            <a href="mailto:{{ $message->email }}?subject={{ rawurlencode('RE: '.$message->subject) }}" class="btn-primary px-5 py-2.5 text-sm">
                <x-icon name="mail" class="h-4 w-4" /> Reply by email
            </a>
            <form method="POST" action="{{ route('admin.messages.toggle-read', $message) }}">
                @csrf
                @method('PATCH')
                <button type="submit" class="btn-outline px-5 py-2.5 text-sm">
                    {{ $message->is_read ? 'Mark as unread' : 'Mark as read' }}
                </button>
            </form>
            <x-admin.confirm-delete :action="route('admin.messages.destroy', $message)" title="Delete this message?" />
        </div>
    </div>
</x-admin-layout>
