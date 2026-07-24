# EFEA — Website Redesign (Laravel 12)

Redesign modern & responsif untuk website **PT Efea Inovasi Solusi** ([efea.id](https://efea.id/))
menggunakan **Laravel 12**, lengkap dengan **panel admin** dan **CRUD** untuk seluruh konten utama website.

> Dibangun sebagai bagian dari tugas magang: rebuild website EFEA dengan tampilan modern, autentikasi admin,
> dashboard, CRUD konten, upload gambar, validasi form, migration & seeder, serta desain responsif.

---

## Fitur Utama

**Public Website (Deep-blue Corporate)**

- Beranda dinamis: hero slider, statistik, tentang kami, layanan, keunggulan, portofolio (dengan filter kategori), tim, artikel terbaru, dan form kontak.
- Halaman: **Tentang Kami**, **Layanan** (+ detail), **Portofolio** (+ detail & filter), **Artikel** (+ detail & pagination), **Kontak** (+ Google Maps embed).
- Sepenuhnya **responsif** (mobile-first) dengan navigasi & footer yang datanya diambil dari database.

**Admin Panel**

- **Login** aman (Laravel Breeze) — registrasi publik dinonaktifkan, akses dibatasi role `admin`.
- **Dashboard** dengan kartu statistik, pesan terbaru, dan artikel terbaru.
- **CRUD lengkap** untuk 9 modul konten:
  | Modul | Keterangan |
  |---|---|
  | Hero Slides | Banner/hero section beranda |
  | Company Profile | Profil perusahaan (about, visi, misi, statistik) |
  | Why Choose Us | Keunggulan ("Mengapa memilih kami") |
  | Services | Layanan |
  | Projects | Portofolio/Project |
  | Articles | Berita/Artikel |
  | Team | Anggota tim |
  | Messages | Kotak masuk pesan dari form kontak (baca/hapus) |
  | Site Settings | Branding, kontak, & social media |
- **Upload gambar** dengan validasi (jpg/png/webp, maks 2MB); gambar lama otomatis diganti/dihapus.
- **Validasi form** via Form Request, **search** & **pagination** pada tabel, konfirmasi hapus, auto-generate **slug**.

---

## Tools

- **Laravel 12** (PHP 8.2+)
- **MySQL / MariaDB**
- **Blade + Alpine.js + Tailwind CSS v3** (via Vite)
- **Laravel Breeze** (autentikasi)
- **Pest** (testing)

---

## Prasyarat

- PHP **8.2+** dengan ekstensi: `pdo_mysql`, `mbstring`, `openssl`, `fileinfo`
- **Composer** 2.x
- **Node.js** 18+ & **npm**
- **MySQL** atau **MariaDB** (mis. dari XAMPP)

---

## Instalasi & Menjalankannya

```bash
# 1. Masuk ke folder proyek
cd efea-redesign

# 2. Install dependency PHP & JavaScript
composer install
npm install

# 3. Siapkan file environment
cp .env.example .env
php artisan key:generate
```

**4. Konfigurasi database** — pastikan MySQL/MariaDB berjalan, lalu buat database:

```sql
CREATE DATABASE efea_redesign CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
```

Sesuaikan kredensial pada `.env` bila perlu (default XAMPP: user `root`, password kosong):

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=efea_redesign
DB_USERNAME=root
DB_PASSWORD=
```

```bash
# 5. Migrasi + seed data awal
php artisan migrate:fresh --seed

# 6. Symlink storage (agar gambar upload dapat diakses publik)
php artisan storage:link

# 7. Build aset front-end
npm run build          # atau: npm run dev  (mode pengembangan)

# 8. Jalankan aplikasi
php artisan serve
```

Buka **http://127.0.0.1:8000** di browser.

---

## Admin

|              |                             |
| ------------ | --------------------------- |
| **URL**      | http://127.0.0.1:8000/login |
| **Email**    | `admin@efea.id`             |
| **Password** | `password`                  |

Setelah login Anda diarahkan ke **Dashboard Admin** (`/admin`).

---

## Struktur Ringkas folder

```
app/
├── Concerns/               # HasSlug, HandlesImageUpload (trait yang dapat digunakan ulang)
├── Http/
│   ├── Controllers/        # Controller publik (Page, Service, Project, Article)
│   │   └── Admin/          # Controller admin (Dashboard + CRUD per modul)
│   ├── Middleware/         # EnsureUserIsAdmin
│   └── Requests/           # Form Request (validasi) — Admin/ & ContactRequest
├── Models/                 # 9 model konten + User
└── Providers/              # AppServiceProvider (view composer: SiteSetting global)

database/
├── migrations/             # Skema tabel
├── factories/              # Factory untuk testing/seed
└── seeders/                # Seeder konten EFEA

resources/views/
├── components/             # Komponen Blade (layout, kartu, form field, icon)
├── admin/                  # View panel admin per modul
└── public/                 # View halaman publik
```

---

## Testing

```bash
php artisan test
```

Mencakup pengujian autentikasi (Breeze), otorisasi admin, CRUD service, serta validasi & penyimpanan form kontak.
Tes berjalan di atas SQLite in-memory sehingga **tidak** memerlukan MySQL.

---

## Note

- **Upload gambar**: menggunakan `public` disk. Jika gambar tidak tampil, pastikan sudah menjalankan `php artisan storage:link`.
- **Data seed** bersifat contoh/ilustratif (termasuk nama anggota tim) dan dapat diubah sepenuhnya melalui panel admin.
- **Alternatif SQLite**: bila tidak ingin memakai MySQL, set `DB_CONNECTION=sqlite` pada `.env`, buat file `database/database.sqlite`, lalu jalankan `php artisan migrate:fresh --seed`.
- Konten mengacu pada website PT EFEA saat ini sebagai referensi, kemudian dikembangkan ulang dengan desain yang lebih modern.
