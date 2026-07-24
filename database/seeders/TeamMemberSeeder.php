<?php

namespace Database\Seeders;

use App\Models\TeamMember;
use Illuminate\Database\Seeder;

class TeamMemberSeeder extends Seeder
{
    public function run(): void
    {
        // Matches the "Team (Core)" section on efea.id, which lists members
        // by their initials and C-level roles.
        $members = [
            ['name' => 'ANG', 'position' => 'Chief Executive Officer'],
            ['name' => 'NEN', 'position' => 'Chief Operation Officer'],
            ['name' => 'GDP', 'position' => 'Chief Technology Officer'],
            ['name' => 'YDK', 'position' => 'Chief Information Officer'],
            ['name' => 'ANG', 'position' => 'Chief Support Officer'],
            ['name' => 'NEN', 'position' => 'Chief Finance Officer'],
        ];

        foreach ($members as $index => $member) {
            TeamMember::create($member + ['sort_order' => $index + 1]);
        }
    }
}
