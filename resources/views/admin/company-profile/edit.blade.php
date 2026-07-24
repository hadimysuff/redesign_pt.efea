<x-admin-layout title="Company Profile">
    <x-admin.page-header title="Company Profile" subtitle="Profil Perusahaan — about, vision, mission and headline stats." />

    <div class="admin-card mx-auto max-w-3xl p-6 sm:p-8">
        <form method="POST" action="{{ route('admin.company-profile.update') }}" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')
            <div class="grid gap-5 sm:grid-cols-2">
                <div class="sm:col-span-2">
                    <x-admin.textarea name="about" label="About" :value="$profile->about" rows="5" />
                </div>
                <div class="sm:col-span-2">
                    <x-admin.textarea name="vision" label="Vision" :value="$profile->vision" rows="3" />
                </div>
                <div class="sm:col-span-2">
                    <x-admin.textarea name="mission" label="Mission" :value="$profile->mission" rows="3" />
                </div>
                <div class="sm:col-span-2">
                    <x-admin.textarea name="history" label="History" :value="$profile->history" rows="4" />
                </div>
                <div class="sm:col-span-2">
                    <x-admin.file name="image" label="Profile image" :current="$profile->image" />
                </div>

                <p class="sm:col-span-2 font-display font-bold text-slate-900 pt-2">Headline stats</p>

                <x-admin.field name="stat_years" label="Years of experience" type="number" min="0" :value="$profile->stat_years ?? 0" />
                <x-admin.field name="stat_projects" label="Projects delivered" type="number" min="0" :value="$profile->stat_projects ?? 0" />
                <x-admin.field name="stat_clients" label="Happy clients" type="number" min="0" :value="$profile->stat_clients ?? 0" />
                <x-admin.field name="stat_team" label="Team members" type="number" min="0" :value="$profile->stat_team ?? 0" />
            </div>

            <div class="flex items-center justify-end gap-3 border-t border-slate-100 pt-6">
                <a href="{{ route('admin.dashboard') }}" class="btn-outline px-5 py-2.5 text-sm">Cancel</a>
                <button type="submit" class="btn-primary px-5 py-2.5 text-sm">Save changes</button>
            </div>
        </form>
    </div>
</x-admin-layout>
