<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Article;
use App\Models\CompanyProfile;
use App\Models\ContactMessage;
use App\Models\Feature;
use App\Models\HeroSlide;
use App\Models\Project;
use App\Models\Service;
use App\Models\TeamMember;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class PageController extends Controller
{
    public function home(): View
    {
        return view('public.home', [
            'heroSlides' => HeroSlide::active()->ordered()->get(),
            'profile' => CompanyProfile::current(),
            'features' => Feature::ordered()->get(),
            'services' => Service::active()->ordered()->take(6)->get(),
            'projects' => Project::ordered()->take(8)->get(),
            'team' => TeamMember::ordered()->get(),
            'articles' => Article::published()->latestFirst()->take(3)->get(),
        ]);
    }

    public function about(): View
    {
        return view('public.about', [
            'profile' => CompanyProfile::current(),
            'features' => Feature::ordered()->get(),
            'team' => TeamMember::ordered()->get(),
        ]);
    }

    public function contact(): View
    {
        return view('public.contact');
    }

    public function contactStore(ContactRequest $request): RedirectResponse
    {
        ContactMessage::create($request->validated());

        return back()->with('success', 'Terima kasih! Pesan Anda telah terkirim. Tim kami akan segera menghubungi Anda.');
    }
}
