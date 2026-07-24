@props([
    'action',
    'title' => 'Delete this item?',
    'message' => 'This action cannot be undone.',
])

<div x-data="{ open: false }" class="inline-flex">
    <button type="button" @click="open = true"
            class="inline-flex items-center gap-1 rounded-lg p-2 text-slate-400 transition hover:bg-red-50 hover:text-red-600"
            title="Delete">
        <x-icon name="trash" class="h-5 w-5" />
    </button>

    <template x-teleport="body">
        <div x-show="open" x-cloak class="fixed inset-0 z-50 flex items-center justify-center p-4"
             style="display:none">
            <div x-show="open" x-transition.opacity @click="open = false"
                 class="absolute inset-0 bg-slate-900/50"></div>
            <div x-show="open" x-transition
                 class="relative w-full max-w-md rounded-2xl bg-white p-6 shadow-xl">
                <div class="flex items-start gap-4">
                    <span class="flex h-11 w-11 shrink-0 items-center justify-center rounded-full bg-red-100 text-red-600">
                        <x-icon name="trash" class="h-5 w-5" />
                    </span>
                    <div>
                        <h3 class="font-display text-lg font-bold text-slate-900">{{ $title }}</h3>
                        <p class="mt-1 text-sm text-slate-500">{{ $message }}</p>
                    </div>
                </div>
                <div class="mt-6 flex justify-end gap-3">
                    <button type="button" @click="open = false" class="btn-outline px-4 py-2">Cancel</button>
                    <form method="POST" action="{{ $action }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                                class="inline-flex items-center justify-center gap-2 rounded-xl bg-red-600 px-5 py-2 text-sm font-semibold text-white transition hover:bg-red-700">
                            Delete
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </template>
</div>
