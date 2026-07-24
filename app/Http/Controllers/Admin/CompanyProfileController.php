<?php

namespace App\Http\Controllers\Admin;

use App\Concerns\HandlesImageUpload;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CompanyProfileRequest;
use App\Models\CompanyProfile;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class CompanyProfileController extends Controller
{
    use HandlesImageUpload;

    public function edit(): View
    {
        $profile = CompanyProfile::current();

        return view('admin.company-profile.edit', compact('profile'));
    }

    public function update(CompanyProfileRequest $request): RedirectResponse
    {
        $profile = CompanyProfile::current();

        $data = $request->validated();
        $data['image'] = $this->storeImage($request->file('image'), 'company', $profile->image);

        $profile->update($data);

        return redirect()->route('admin.company-profile.edit')->with('success', 'Company profile updated successfully.');
    }
}
