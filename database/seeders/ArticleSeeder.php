<?php

namespace Database\Seeders;

use App\Models\Article;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    public function run(): void
    {
        $articles = [
            [
                'title' => 'Mengapa Transformasi Digital Penting bagi Bisnis Anda',
                'excerpt' => 'Transformasi digital bukan sekadar tren, melainkan kebutuhan untuk tetap kompetitif di era modern.',
                'author' => 'Tim EFEA',
                'days_ago' => 5,
                'body' => "Di tengah persaingan bisnis yang semakin ketat, transformasi digital menjadi kunci untuk bertahan dan tumbuh. Perusahaan yang mampu memanfaatkan teknologi secara tepat akan lebih gesit dalam merespons perubahan pasar.\n\nTransformasi digital yang berhasil diukur melalui tiga hal: solusi yang efektif dan inovatif, pertumbuhan penjualan, serta efisiensi biaya operasional. Ketiganya saling berkaitan dan harus dicapai secara bertahap.\n\nMulailah dengan menentukan partner teknologi yang tepat, lalu sederhanakan target yang ingin dicapai. Dengan pendekatan yang terukur, transformasi digital akan membawa dampak nyata bagi bisnis Anda.",
            ],
            [
                'title' => 'Memilih Partner IT yang Tepat untuk Perusahaan',
                'excerpt' => 'Partner IT yang tepat adalah investasi jangka panjang untuk keberlangsungan bisnis.',
                'author' => 'Tim EFEA',
                'days_ago' => 12,
                'body' => "Banyak perusahaan mengalami kerugian karena menggunakan solusi teknologi yang tidak tepat. Memilih partner IT yang tepat menjadi langkah krusial dalam perjalanan transformasi.\n\nPartner yang baik tidak hanya menyediakan teknologi, tetapi juga memahami kebutuhan bisnis Anda dan berkomitmen menyelesaikan pekerjaan hingga tuntas.\n\nPastikan partner Anda memiliki tim yang kompeten, berpengalaman, dan fokus pada solusi. Kolaborasi yang baik akan menghasilkan hasil yang optimal.",
            ],
            [
                'title' => 'Keamanan Siber: Prioritas yang Tidak Bisa Ditunda',
                'excerpt' => 'Investasi pada keamanan siber adalah bentuk perlindungan aset digital yang paling berharga.',
                'author' => 'Tim EFEA',
                'days_ago' => 20,
                'body' => "Serangan siber semakin canggih dan dapat menimbulkan kerugian besar bagi perusahaan. Keamanan informasi, aplikasi, dan infrastruktur harus menjadi prioritas.\n\nLangkah pertama adalah mengidentifikasi risiko dan celah keamanan yang ada. Setelah itu, terapkan lapisan pertahanan yang sesuai dengan tingkat risiko bisnis Anda.\n\nDengan monitoring proaktif dan pemeliharaan berkala, perusahaan dapat menjaga kelangsungan operasional dan melindungi data penting dari ancaman.",
            ],
            [
                'title' => 'Efisiensi Operasional melalui Managed Services',
                'excerpt' => 'Serahkan pengelolaan infrastruktur IT kepada ahlinya dan fokus pada bisnis inti Anda.',
                'author' => 'Tim EFEA',
                'days_ago' => 28,
                'body' => "Mengelola infrastruktur IT secara internal seringkali menguras sumber daya. Managed services hadir sebagai solusi untuk mengoptimalkan dan melindungi infrastruktur Anda.\n\nDengan monitoring dan pemeliharaan proaktif, potensi masalah dapat diantisipasi sebelum berdampak pada operasional. Tim Anda pun dapat lebih fokus pada bisnis inti.\n\nManaged services bukan hanya soal efisiensi biaya, tetapi juga meningkatkan keandalan dan kinerja sistem secara keseluruhan.",
            ],
        ];

        foreach ($articles as $index => $article) {
            Article::create([
                'title' => $article['title'],
                'excerpt' => $article['excerpt'],
                'body' => $article['body'],
                'author' => $article['author'],
                'is_published' => true,
                'published_at' => now()->subDays($article['days_ago']),
            ]);
        }
    }
}
