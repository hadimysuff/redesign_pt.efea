<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\ContactMessage;
use App\Models\Project;
use App\Models\Service;
use App\Models\TeamMember;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $stats = [
            'services' => Service::count(),
            'projects' => Project::count(),
            'articles' => Article::count(),
            'team' => TeamMember::count(),
            'messages' => ContactMessage::count(),
            'unread' => ContactMessage::where('is_read', false)->count(),
        ];

        $recentMessages = ContactMessage::latest()->take(5)->get();
        $recentArticles = Article::latest()->take(5)->get();

        return view('admin.dashboard', compact('stats', 'recentMessages', 'recentArticles'));
    }
}
