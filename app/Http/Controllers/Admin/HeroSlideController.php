<?php

namespace App\Http\Controllers\Admin;

use App\Concerns\HandlesImageUpload;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\HeroSlideRequest;
use App\Models\HeroSlide;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HeroSlideController extends Controller
{
    use HandlesImageUpload;

    public function index(Request $request): View
    {
        $search = $request->string('search')->toString();

        $slides = HeroSlide::query()
            ->when($search, fn ($query) => $query->where(fn ($sub) => $sub
                ->where('title', 'like', "%{$search}%")
                ->orWhere('subtitle', 'like', "%{$search}%")))
            ->ordered()
            ->paginate(10)
            ->withQueryString();

        return view('admin.hero-slides.index', compact('slides', 'search'));
    }

    public function create(): View
    {
        return view('admin.hero-slides.create', ['slide' => new HeroSlide]);
    }

    public function store(HeroSlideRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $data['image'] = $this->storeImage($request->file('image'), 'hero');

        HeroSlide::create($data);

        return redirect()->route('admin.hero-slides.index')->with('success', 'Hero slide created successfully.');
    }

    public function edit(HeroSlide $heroSlide): View
    {
        return view('admin.hero-slides.edit', ['slide' => $heroSlide]);
    }

    public function update(HeroSlideRequest $request, HeroSlide $heroSlide): RedirectResponse
    {
        $data = $request->validated();
        $data['image'] = $this->storeImage($request->file('image'), 'hero', $heroSlide->image);

        $heroSlide->update($data);

        return redirect()->route('admin.hero-slides.index')->with('success', 'Hero slide updated successfully.');
    }

    public function destroy(HeroSlide $heroSlide): RedirectResponse
    {
        $this->deleteImage($heroSlide->image);
        $heroSlide->delete();

        return redirect()->route('admin.hero-slides.index')->with('success', 'Hero slide deleted.');
    }
}
