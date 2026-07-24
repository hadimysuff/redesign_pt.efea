<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\FeatureRequest;
use App\Models\Feature;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class FeatureController extends Controller
{
    public function index(Request $request): View
    {
        $search = $request->string('search')->toString();

        $features = Feature::query()
            ->when($search, fn ($query) => $query->where('title', 'like', "%{$search}%"))
            ->ordered()
            ->paginate(10)
            ->withQueryString();

        return view('admin.features.index', compact('features', 'search'));
    }

    public function create(): View
    {
        return view('admin.features.create', ['feature' => new Feature]);
    }

    public function store(FeatureRequest $request): RedirectResponse
    {
        Feature::create($request->validated());

        return redirect()->route('admin.features.index')->with('success', 'Feature created successfully.');
    }

    public function edit(Feature $feature): View
    {
        return view('admin.features.edit', compact('feature'));
    }

    public function update(FeatureRequest $request, Feature $feature): RedirectResponse
    {
        $feature->update($request->validated());

        return redirect()->route('admin.features.index')->with('success', 'Feature updated successfully.');
    }

    public function destroy(Feature $feature): RedirectResponse
    {
        $feature->delete();

        return redirect()->route('admin.features.index')->with('success', 'Feature deleted.');
    }
}
