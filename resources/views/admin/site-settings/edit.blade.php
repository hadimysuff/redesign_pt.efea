<x-admin-layout title="Site Settings">
    <x-admin.page-header title="Site Settings" subtitle="Branding, contact details and social links used across the public site." />

    <form method="POST" action="{{ route('admin.site-settings.update') }}" enctype="multipart/form-data" class="space-y-8">
        @csrf
        @method('PUT')

        <div class="admin-card p-6 sm:p-8">
            <h2 class="mb-5 font-display font-bold text-slate-900">Brand</h2>
            <div class="grid gap-5 sm:grid-cols-2">
                <div class="sm:col-span-2">
                    <x-admin.field name="company_name" label="Company name" :value="$setting->company_name" required />
                </div>
                <x-admin.field name="tagline" label="Tagline" :value="$setting->tagline" />
                <div class="sm:col-span-2">
                    <x-admin.textarea name="description" label="Description" :value="$setting->description" rows="3" />
                </div>
                <div class="sm:col-span-2">
                    <x-admin.file name="logo" label="Logo" :current="$setting->logo" />
                </div>
            </div>
        </div>

        <div class="admin-card p-6 sm:p-8">
            <h2 class="mb-5 font-display font-bold text-slate-900">Contact</h2>
            <div class="grid gap-5 sm:grid-cols-2">
                <x-admin.field name="email" label="Email" type="email" :value="$setting->email" />
                <x-admin.field name="phone" label="Phone" :value="$setting->phone" />
                <div class="sm:col-span-2">
                    <x-admin.textarea name="address" label="Address" :value="$setting->address" rows="2" />
                </div>
                <div class="sm:col-span-2">
                    <x-admin.textarea name="map_embed" label="Map embed" :value="$setting->map_embed" rows="3"
                                      help="Google Maps embed URL (the src of the iframe)." />
                </div>
            </div>
        </div>

        <div class="admin-card p-6 sm:p-8">
            <h2 class="mb-5 font-display font-bold text-slate-900">Social links</h2>
            <div class="grid gap-5 sm:grid-cols-2">
                <x-admin.field name="facebook" label="Facebook" type="url" :value="$setting->facebook" placeholder="https://…" />
                <x-admin.field name="instagram" label="Instagram" type="url" :value="$setting->instagram" placeholder="https://…" />
                <x-admin.field name="linkedin" label="LinkedIn" type="url" :value="$setting->linkedin" placeholder="https://…" />
                <x-admin.field name="twitter" label="Twitter" type="url" :value="$setting->twitter" placeholder="https://…" />
                <x-admin.field name="youtube" label="YouTube" type="url" :value="$setting->youtube" placeholder="https://…" />
                <div class="sm:col-span-2">
                    <x-admin.textarea name="footer_text" label="Footer text" :value="$setting->footer_text" rows="2" />
                </div>
            </div>
        </div>

        <div class="flex items-center justify-end gap-3">
            <button type="submit" class="btn-primary px-5 py-2.5 text-sm">Save settings</button>
        </div>
    </form>
</x-admin-layout>
