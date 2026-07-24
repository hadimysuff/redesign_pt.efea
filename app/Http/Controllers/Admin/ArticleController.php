<?php

namespace App\Http\Controllers\Admin;

use App\Concerns\HandlesImageUpload;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ArticleRequest;
use App\Models\Article;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ArticleController extends Controller
{
    use HandlesImageUpload;

    public function index(Request $request): View
    {
        $search = $request->string('search')->toString();

        $articles = Article::query()
            ->when($search, fn ($query) => $query->where(fn ($sub) => $sub
                ->where('title', 'like', "%{$search}%")
                ->orWhere('author', 'like', "%{$search}%")))
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('admin.articles.index', compact('articles', 'search'));
    }

    public function create(): View
    {
        return view('admin.articles.create', ['article' => new Article]);
    }

    public function store(ArticleRequest $request): RedirectResponse
    {
        $data = $this->prepareData($request);
        $data['cover_image'] = $this->storeImage($request->file('cover_image'), 'articles');

        Article::create($data);

        return redirect()->route('admin.articles.index')->with('success', 'Article created successfully.');
    }

    public function edit(Article $article): View
    {
        return view('admin.articles.edit', compact('article'));
    }

    public function update(ArticleRequest $request, Article $article): RedirectResponse
    {
        $data = $this->prepareData($request);
        $data['cover_image'] = $this->storeImage($request->file('cover_image'), 'articles', $article->cover_image);

        $article->update($data);

        return redirect()->route('admin.articles.index')->with('success', 'Article updated successfully.');
    }

    public function destroy(Article $article): RedirectResponse
    {
        $this->deleteImage($article->cover_image);
        $article->delete();

        return redirect()->route('admin.articles.index')->with('success', 'Article deleted.');
    }

    /**
     * Default the publish date to now when an article is published without one.
     *
     * @return array<string, mixed>
     */
    private function prepareData(ArticleRequest $request): array
    {
        $data = $request->validated();

        if (! empty($data['is_published']) && empty($data['published_at'])) {
            $data['published_at'] = now();
        }

        return $data;
    }
}
