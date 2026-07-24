<?php

namespace Database\Seeders;

use App\Models\SiteSetting;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class SiteSettingSeeder extends Seeder
{
    public function run(): void
    {
        SiteSetting::updateOrCreate(['id' => 1], [
            'company_name' => 'PT Efea Inovasi Solusi',
            'tagline' => 'Solusi Transformasi Digital Bisnis',
            'description' => 'PT Efea Inovasi Solusi merupakan perusahaan penyedia solusi teknologi informasi untuk perusahaan di Indonesia, memberikan solusi untuk memenuhi kebutuhan bisnis anda dengan kreativitas inovasi.',
            'email' => 'angga@efea.co.id',
            'phone' => '+62 857 8090 4906',
            'address' => 'Plaza Summarecon Bekasi Lt. 7, Jl Bulevar Ahmad Yani Kav. K.01, Medan Satria, Kota Bekasi, Jawa Barat 17143',
            'map_embed' => 'https://maps.google.com/maps?q=efea%20inovasi%20solusi&t=&z=13&ie=UTF8&iwloc=&output=embed',
            'logo' => $this->seedImage('efea.png'),
            'facebook' => null,
            'instagram' => null,
            'linkedin' => null,
            'twitter' => null,
            'youtube' => null,
            'footer_text' => 'Your Digital Transformation Partner',
        ]);
    }

    /**
     * Copy the bundled logo into the public disk and return its path.
     */
    private function seedImage(?string $filename): ?string
    {
        if (! $filename) {
            return null;
        }

        $source = database_path('seeders/assets/site/'.$filename);

        if (! File::exists($source)) {
            return null;
        }

        $path = 'site/'.$filename;
        Storage::disk('public')->put($path, File::get($source));

        return $path;
    }
}
