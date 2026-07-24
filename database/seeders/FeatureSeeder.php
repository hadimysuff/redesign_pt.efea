<?php

namespace Database\Seeders;

use App\Models\Feature;
use Illuminate\Database\Seeder;

class FeatureSeeder extends Seeder
{
    public function run(): void
    {
        $features = [
            [
                'icon' => 'shield-check',
                'title' => 'Berkomitmen',
                'description' => 'Kami selalu berkomitmen untuk menyelesaikan apa yang telah kami mulai.',
                'sort_order' => 1,
            ],
            [
                'icon' => 'star',
                'title' => 'Berpengalaman',
                'description' => 'Dikerjakan oleh tim yang berkompetensi dan berpengalaman.',
                'sort_order' => 2,
            ],
            [
                'icon' => 'rocket',
                'title' => 'Fokus pada Solusi',
                'description' => 'Solusi yang efektif dan efisien dalam penyelesaian masalah.',
                'sort_order' => 3,
            ],
        ];

        foreach ($features as $feature) {
            Feature::create($feature);
        }
    }
}
