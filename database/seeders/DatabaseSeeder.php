<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database with the EFEA site content.
     */
    public function run(): void
    {
        $this->call([
            AdminUserSeeder::class,
            SiteSettingSeeder::class,
            CompanyProfileSeeder::class,
            HeroSlideSeeder::class,
            FeatureSeeder::class,
            ServiceSeeder::class,
            ProjectSeeder::class,
            TeamMemberSeeder::class,
            ArticleSeeder::class,
            ContactMessageSeeder::class,
        ]);
    }
}
