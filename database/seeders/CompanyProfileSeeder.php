<?php

namespace Database\Seeders;

use App\Models\CompanyProfile;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class CompanyProfileSeeder extends Seeder
{
    public function run(): void
    {
        CompanyProfile::updateOrCreate(['id' => 1], [
            'about' => "PT Efea Inovasi Solusi merupakan perusahaan penyedia solusi teknologi informasi untuk perusahaan di Indonesia, memberikan solusi untuk memenuhi kebutuhan bisnis anda dengan kreativitas inovasi.\n\nPersaingan di dunia bisnis yang semakin ketat membuat perusahaan harus bisa melakukan \"gebrakan\" agar tetap satu arah dengan perkembangan pasar. Salah satu langkah yang dapat diambil untuk menghindari kerugian adalah melakukan transformasi.\n\nBeberapa langkah yang dapat dilakukan untuk mempercepat transformasi bisnis:\n• Berhenti menggunakan solusi teknologi yang tidak tepat.\n• Tentukan partner yang tepat dan lakukan kolaborasi.\n• Sederhanakan pencapaian yang ingin dituju, dan lakukan secara bertahap.",
            'vision' => 'Menjadi partner transformasi digital yang menghadirkan solusi efektif dan inovatif untuk pertumbuhan bisnis di Indonesia.',
            'mission' => 'Memadukan kemampuan teknologi dan sumber daya manusia untuk menciptakan situasi perusahaan yang lebih baik — mendorong pertumbuhan penjualan dan efisiensi biaya operasional.',
            'history' => 'Untuk mempercepat transformasi bisnis, teknologi adalah hal yang paling dapat dimanfaatkan untuk membantu bisnis mencapai tujuannya. Keberhasilan transformasi diukur melalui tiga hal: solusi efektif dan inovatif, pertumbuhan penjualan, serta efisiensi biaya operasional.',
            'image' => $this->seedImage('people.png'),
            'stat_years' => 8,
            'stat_projects' => 50,
            'stat_clients' => 30,
            'stat_team' => 12,
        ]);
    }

    /**
     * Copy a bundled profile image into the public disk and return its path.
     */
    private function seedImage(?string $filename): ?string
    {
        if (! $filename) {
            return null;
        }

        $source = database_path('seeders/assets/company/'.$filename);

        if (! File::exists($source)) {
            return null;
        }

        $path = 'company/'.$filename;
        Storage::disk('public')->put($path, File::get($source));

        return $path;
    }
}
