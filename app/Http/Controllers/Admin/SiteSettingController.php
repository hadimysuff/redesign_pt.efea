<?php

namespace App\Http\Controllers\Admin;

use App\Concerns\HandlesImageUpload;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SiteSettingRequest;
use App\Models\SiteSetting;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class SiteSettingController extends Controller
{
    use HandlesImageUpload;

    public function edit(): View
    {
        $setting = SiteSetting::current();

        return view('admin.site-settings.edit', compact('setting'));
    }

    public function update(SiteSettingRequest $request): RedirectResponse
    {
        $setting = SiteSetting::current();

        $data = $request->validated();
        $data['logo'] = $this->storeImage($request->file('logo'), 'site', $setting->logo);

        $setting->update($data);

        return redirect()->route('admin.site-settings.edit')->with('success', 'Site settings updated successfully.');
    }
}
