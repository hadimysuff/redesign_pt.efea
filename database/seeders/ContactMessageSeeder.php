<?php

namespace Database\Seeders;

use App\Models\ContactMessage;
use Illuminate\Database\Seeder;

class ContactMessageSeeder extends Seeder
{
    public function run(): void
    {
        $messages = [
            ['name' => 'Budi Santoso', 'email' => 'budi.santoso@example.com', 'phone' => '+62 812 3456 7890',
             'subject' => 'Konsultasi Pengembangan Aplikasi', 'is_read' => false,
             'message' => 'Selamat siang, kami tertarik untuk mengembangkan aplikasi internal perusahaan. Mohon informasi lebih lanjut mengenai layanan pengembangan aplikasi EFEA.'],
            ['name' => 'Siti Nurhaliza', 'email' => 'siti.n@example.com', 'phone' => '+62 813 9876 5432',
             'subject' => 'Penawaran Managed Services', 'is_read' => false,
             'message' => 'Halo, kami ingin mendiskusikan kebutuhan managed services untuk infrastruktur IT kami. Apakah bisa dijadwalkan pertemuan?'],
            ['name' => 'Andi Wijaya', 'email' => 'andi.wijaya@example.com', 'phone' => null,
             'subject' => 'Pertanyaan Keamanan Siber', 'is_read' => true,
             'message' => 'Kami membutuhkan audit keamanan untuk aplikasi web perusahaan. Mohon informasi mengenai prosedur dan estimasi biayanya.'],
            ['name' => 'Dewi Lestari', 'email' => 'dewi.lestari@example.com', 'phone' => '+62 811 2233 4455',
             'subject' => 'Kerjasama Data Center', 'is_read' => true,
             'message' => 'Perusahaan kami berencana membangun data center baru. Kami tertarik dengan layanan konsultan data center EFEA.'],
        ];

        foreach ($messages as $message) {
            ContactMessage::create($message);
        }
    }
}
