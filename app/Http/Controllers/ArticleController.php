<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\View\View;

class ArticleController extends Controller
{
    public function index(): View
    {
        $articles = Article::published()->latestFirst()->paginate(9);

        return view('public.articles.index', compact('articles'));
    }

    public function show(Article $article): View
    {
        abort_unless($article->is_published && $article->published_at && ! $article->published_at->isFuture(), 404);

        $recent = Article::published()
            ->whereKeyNot($article->id)
            ->latestFirst()
            ->take(3)
            ->get();

        return view('public.articles.show', compact('article', 'recent'));
    }
}
