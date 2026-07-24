<?php

namespace App\Providers;

use App\Models\SiteSetting;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        // Share the site settings (branding + contact details) with every
        // public-facing view and the public layout so the header and footer
        // always have a single source of truth.
        View::composer(['components.public-layout', 'public.*'], function ($view) {
            $view->with('siteSetting', SiteSetting::current());
        });
    }
}
