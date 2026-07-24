<?php

namespace App\Http\Controllers\Admin;

use App\Concerns\HandlesImageUpload;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TeamMemberRequest;
use App\Models\TeamMember;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TeamMemberController extends Controller
{
    use HandlesImageUpload;

    public function index(Request $request): View
    {
        $search = $request->string('search')->toString();

        $members = TeamMember::query()
            ->when($search, fn ($query) => $query->where(fn ($sub) => $sub
                ->where('name', 'like', "%{$search}%")
                ->orWhere('position', 'like', "%{$search}%")))
            ->ordered()
            ->paginate(10)
            ->withQueryString();

        return view('admin.team.index', compact('members', 'search'));
    }

    public function create(): View
    {
        return view('admin.team.create', ['member' => new TeamMember]);
    }

    public function store(TeamMemberRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $data['photo'] = $this->storeImage($request->file('photo'), 'team');

        TeamMember::create($data);

        return redirect()->route('admin.team.index')->with('success', 'Team member created successfully.');
    }

    public function edit(TeamMember $teamMember): View
    {
        return view('admin.team.edit', ['member' => $teamMember]);
    }

    public function update(TeamMemberRequest $request, TeamMember $teamMember): RedirectResponse
    {
        $data = $request->validated();
        $data['photo'] = $this->storeImage($request->file('photo'), 'team', $teamMember->photo);

        $teamMember->update($data);

        return redirect()->route('admin.team.index')->with('success', 'Team member updated successfully.');
    }

    public function destroy(TeamMember $teamMember): RedirectResponse
    {
        $this->deleteImage($teamMember->photo);
        $teamMember->delete();

        return redirect()->route('admin.team.index')->with('success', 'Team member deleted.');
    }
}
