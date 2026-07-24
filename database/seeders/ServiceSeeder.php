<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        $services = [
            [
                'title' => 'Konsultasi IT',
                'icon' => 'chart',
                'excerpt' => 'Memastikan untuk mengantarkan proyek Anda tepat waktu, sesuai anggaran, dan sesuai dengan ruang lingkup proyek.',
                'description' => "Proyek berbasis teknologi informasi memiliki komponen yang dinamis, dengan ketergantungan pada faktor-faktor yang sering berada di luar kendali langsung. Bahkan proyek yang terdefinisi jelas berpotensi keluar dari ruang lingkup, manajemen sumber daya yang tidak efektif, atau komunikasi yang buruk.\n\nManajemen proyek kami memastikan untuk mengantarkan proyek Anda tepat waktu, sesuai anggaran, dan sesuai dengan ruang lingkup proyek.",
            ],
            [
                'title' => 'IT Managed Services',
                'icon' => 'cog',
                'excerpt' => 'Strategi optimasi dan perlindungan infrastruktur teknologi informasi anda dengan monitoring pro-aktif dan layanan maintenance.',
                'description' => 'Strategi optimasi dan perlindungan infrastruktur teknologi informasi anda dengan monitoring pro-aktif dan layanan maintenance, sehingga tim Anda dapat fokus pada bisnis inti sementara kami menjaga sistem tetap andal dan aman.',
            ],
            [
                'title' => 'Pengembangan Aplikasi',
                'icon' => 'code',
                'excerpt' => 'Pengembangan aplikasi dengan desain dan perancangan sesuai kebutuhan bisnis anda.',
                'description' => 'Pengembangan aplikasi dengan desain dan perancangan sesuai kebutuhan bisnis anda — mulai dari aplikasi web, mobile, hingga sistem enterprise, dibangun dengan praktik terbaik agar mudah dikembangkan dan berkelanjutan.',
            ],
            [
                'title' => 'Keamanan Cyber',
                'icon' => 'shield-check',
                'excerpt' => 'Layanan keamanan informasi, keamanan aplikasi dan infrastruktur.',
                'description' => 'Layanan keamanan informasi, keamanan aplikasi dan infrastruktur untuk melindungi aset digital perusahaan Anda dari berbagai ancaman siber.',
            ],
            [
                'title' => 'Konsultan Data Center',
                'icon' => 'server',
                'excerpt' => 'Perancangan, pembangunan dan maintenance data center sesuai standard internasional.',
                'description' => 'Perancangan, pembangunan dan maintenance data center sesuai standard internasional, dilengkapi dengan tim yang siap memberikan solusi IT khusus untuk infrastruktur.',
            ],
            [
                'title' => 'IT Master Plan, IT Gov dan BCM',
                'icon' => 'document',
                'excerpt' => 'Perancangan jangka panjang pengembangan TI, penerapan dan manajemen keberlangsungan bisnis anda.',
                'description' => 'Perancangan jangka panjang pengembangan teknologi informasi (IT Master Plan), tata kelola TI (IT Governance), serta manajemen keberlangsungan bisnis (Business Continuity Management) agar teknologi Anda selaras dengan strategi bisnis.',
            ],
        ];

        foreach ($services as $index => $service) {
            Service::create($service + ['sort_order' => $index + 1, 'is_active' => true]);
        }
    }
}
