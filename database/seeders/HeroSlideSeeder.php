<?php

namespace Database\Seeders;

use App\Models\HeroSlide;
use Illuminate\Database\Seeder;

class HeroSlideSeeder extends Seeder
{
    public function run(): void
    {
        HeroSlide::create([
            'eyebrow' => null,
            'title' => 'Solusi transformasi bisnis anda.',
            'subtitle' => null,
            'description' => 'Penyedia solusi teknologi informasi untuk perusahaan di Indonesia — memberikan solusi untuk memenuhi kebutuhan bisnis Anda dengan kreativitas inovasi.',
            'primary_label' => 'Get Started',
            'primary_url' => '/contact',
            'secondary_label' => 'Our Services',
            'secondary_url' => '/services',
            'sort_order' => 1,
            'is_active' => true,
        ]);
    }
}
