<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\View\View;

class ServiceController extends Controller
{
    public function index(): View
    {
        $services = Service::active()->ordered()->get();

        return view('public.services.index', compact('services'));
    }

    public function show(Service $service): View
    {
        abort_unless($service->is_active, 404);

        $others = Service::active()
            ->whereKeyNot($service->id)
            ->ordered()
            ->take(4)
            ->get();

        return view('public.services.show', compact('service', 'others'));
    }
}
