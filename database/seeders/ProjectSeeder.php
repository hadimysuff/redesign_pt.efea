<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        $projects = [
            ['title' => 'Askrindo - SP TJSL', 'category' => 'Aplikasi', 'client' => 'PT Askrindo', 'year' => 2023, 'is_featured' => true, 'file' => 'efea_app-1.png',
             'description' => 'Sistem Pelaporan Tanggung Jawab Sosial & Lingkungan (TJSL) untuk mendukung pengelolaan program TJSL yang lebih terstruktur dan transparan.'],
            ['title' => 'MPM - Sistem Penutupan Mekaar', 'category' => 'Aplikasi', 'client' => 'PT Permodalan Nasional Madani', 'year' => 2022, 'is_featured' => false, 'file' => 'efea_web-3.png',
             'description' => 'Sistem penutupan untuk program Mekaar yang membantu proses operasional pembiayaan berjalan lebih cepat dan akurat.'],
            ['title' => 'Mega Jaya - Laundry System', 'category' => 'Aplikasi', 'client' => 'Mega Jaya', 'year' => 2023, 'is_featured' => false, 'file' => 'efea_app-2.png',
             'description' => 'Aplikasi manajemen laundry untuk mengelola order, pelanggan, dan operasional harian secara digital.'],
            ['title' => 'Indore - SP TJSL', 'category' => 'Aplikasi', 'client' => 'Indore', 'year' => 2022, 'is_featured' => false, 'file' => 'efea_card-2.png',
             'description' => 'Implementasi sistem pelaporan TJSL untuk memudahkan pemantauan dan pelaporan program sosial perusahaan.'],
            ['title' => 'BPR DBL - Managed Services', 'category' => 'Managed Services', 'client' => 'BPR DBL', 'year' => 2021, 'is_featured' => false, 'file' => 'efea_web-2.jpg',
             'description' => 'Layanan managed services untuk memastikan infrastruktur IT bank perkreditan rakyat berjalan andal dan aman.'],
            ['title' => 'MPM - Mekaar Klaim', 'category' => 'Aplikasi', 'client' => 'PT Permodalan Nasional Madani', 'year' => 2023, 'is_featured' => true, 'file' => 'efea_app-3.png',
             'description' => 'Aplikasi pengelolaan klaim untuk program Mekaar yang mempercepat proses klaim dan meningkatkan akurasi data.'],
            ['title' => 'UKM Mart - Point of Sales', 'category' => 'Aplikasi', 'client' => 'UKM Mart', 'year' => 2024, 'is_featured' => false, 'file' => 'efea_card-1.png',
             'description' => 'Aplikasi Point of Sales (POS) untuk ritel UKM yang memudahkan transaksi, manajemen stok, dan pelaporan penjualan.'],
            ['title' => 'OCI - VPN', 'category' => 'Networking', 'client' => 'OCI', 'year' => 2021, 'is_featured' => false, 'file' => 'efea_card-3.jpg',
             'description' => 'Perancangan dan implementasi jaringan VPN untuk koneksi antar-lokasi yang aman dan andal.'],
        ];

        foreach ($projects as $index => $project) {
            $file = $project['file'];
            unset($project['file']);

            Project::create($project + [
                'sort_order' => $index + 1,
                'image' => $this->seedImage($file),
            ]);
        }
    }

    /**
     * Copy a bundled portfolio image into the public disk and return its path,
     * or null when the source asset is not available.
     */
    private function seedImage(?string $filename): ?string
    {
        if (! $filename) {
            return null;
        }

        $source = database_path('seeders/assets/portfolio/'.$filename);

        if (! File::exists($source)) {
            return null;
        }

        $path = 'projects/'.$filename;
        Storage::disk('public')->put($path, File::get($source));

        return $path;
    }
}
