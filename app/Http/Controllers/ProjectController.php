<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProjectController extends Controller
{
    public function index(Request $request): View
    {
        $category = $request->string('category')->toString();

        $projects = Project::query()
            ->when(in_array($category, Project::CATEGORIES, true), fn ($query) => $query->where('category', $category))
            ->ordered()
            ->get();

        return view('public.projects.index', [
            'projects' => $projects,
            'category' => $category,
            'categories' => Project::CATEGORIES,
        ]);
    }

    public function show(Project $project): View
    {
        $related = Project::query()
            ->whereKeyNot($project->id)
            ->where('category', $project->category)
            ->ordered()
            ->take(3)
            ->get();

        return view('public.projects.show', compact('project', 'related'));
    }
}
