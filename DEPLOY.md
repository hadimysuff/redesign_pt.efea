# Panduan Deploy ke Railway (Laravel + MySQL)

Panduan ini untuk men-deploy aplikasi **PT Efea Inovasi Solusi** (Laravel 12) ke
[Railway](https://railway.app) lengkap dengan database MySQL dan login admin yang berfungsi.

> Homepage yang tampil setelah deploy adalah versi **Blade `public.home`** (data dari
> database), **bukan** file `index.html` statis di root.

---

## Ringkasan
- Platform: **Railway** (mendukung PHP + MySQL native).
- Deploy dari repo GitHub: `hadimysuf/redesign_pt.efea`.
- Builder: **Dockerfile** (sudah disiapkan di repo).
- Login admin default: **`admin@efea.id`** / **`password`**.

---

## Langkah 1 — Pastikan kode sudah di GitHub
File deploy (`Dockerfile`, `docker/start.sh`, `.dockerignore`, `railway.json`) sudah
di-commit & push ke branch `main`. Railway akan menarik kode dari sana.

## Langkah 2 — Buat project di Railway
1. Buka https://railway.app → **Login with GitHub**.
2. Klik **New Project** → **Deploy from GitHub repo**.
3. Pilih repo **`redesign_pt.efea`**. Railway otomatis mendeteksi `Dockerfile`.
   (Build pertama boleh dibiarkan gagal/menunggu dulu — kita set variabel & database dulu.)

## Langkah 3 — Tambahkan database MySQL
1. Di dalam project yang sama, klik **New** → **Database** → **Add MySQL**.
2. Tunggu sampai service **MySQL** aktif.

## Langkah 4 — Isi Environment Variables
Buka **service aplikasi** (bukan MySQL) → tab **Variables** → **Raw Editor**, tempel
berikut. Nilai `DB_*` memakai *reference* ke service MySQL (Railway mengisinya otomatis):

```
APP_NAME=EFEA Inovasi Solusi
APP_ENV=production
APP_DEBUG=false
APP_KEY=GANTI_DENGAN_APP_KEY_ANDA
APP_URL=https://GANTI_DENGAN_DOMAIN_RAILWAY

LOG_CHANNEL=stack
LOG_LEVEL=error

DB_CONNECTION=mysql
DB_HOST=${{MySQL.MYSQLHOST}}
DB_PORT=${{MySQL.MYSQLPORT}}
DB_DATABASE=${{MySQL.MYSQLDATABASE}}
DB_USERNAME=${{MySQL.MYSQLUSER}}
DB_PASSWORD=${{MySQL.MYSQLPASSWORD}}

SESSION_DRIVER=database
SESSION_LIFETIME=120
CACHE_STORE=database
QUEUE_CONNECTION=sync
FILESYSTEM_DISK=public
MAIL_MAILER=log
```

- `APP_KEY` → minta ke pengembang / generate dengan `php artisan key:generate --show`
  (format `base64:...`). **Wajib diisi**, kalau tidak app tidak jalan.
- `APP_URL` → isi setelah domain dibuat di Langkah 6 (boleh diisi belakangan lalu redeploy).

## Langkah 5 — Tambahkan Volume (agar gambar tidak hilang)
Gambar konten (logo, hero, portfolio) disimpan di `storage/app/public`. Tanpa volume,
gambar hilang setiap kali redeploy.

1. Buka service aplikasi → **Settings** → **Volumes** → **New Volume**.
2. **Mount path**: `/app/storage/app/public`
3. Simpan.

## Langkah 6 — Buat domain publik
1. Service aplikasi → **Settings** → **Networking** → **Generate Domain**.
2. Salin domain (mis. `https://redesign-pt-efea-production.up.railway.app`).
3. Kembali ke **Variables**, isi `APP_URL` dengan domain tersebut.

## Langkah 7 — Deploy & isi data awal (seed)
1. Setelah variabel & volume siap, klik **Deploy** (atau tunggu redeploy otomatis).
   Saat start, container otomatis menjalankan `migrate --force` (bikin tabel).
2. **Isi data awal sekali saja.** Buka service aplikasi → menu **⋮ / Command Palette**
   → jalankan perintah (one-off) atau lewat shell:
   ```
   php artisan db:seed --force
   ```
   Ini membuat user admin + konten contoh (layanan, artikel, portfolio) dan menyalin
   gambar ke storage.

   > Jalankan **hanya sekali**. Mengulang seed bisa menduplikasi konten.

## Langkah 8 — Uji
- Buka `https://<domain-railway>` → homepage tampil, gambar tidak broken.
- Buka `https://<domain-railway>/login` → login:
  - Email: **`admin@efea.id`**
  - Password: **`password`**
- Masuk ke `/admin` → kelola konten.

> **Ganti password admin** setelah berhasil login (demi keamanan).

---

## Troubleshooting
| Masalah | Penyebab / Solusi |
|---|---|
| `No application encryption key` | `APP_KEY` belum diisi di Variables. |
| Halaman `500` saat buka homepage | Cek log deploy Railway. Biasanya DB belum ke-seed → jalankan `php artisan db:seed --force`. |
| Gambar broken | Volume belum di-mount di `/app/storage/app/public`, atau belum seed. |
| Build gagal saat `npm run build` | Cek `package.json`/`package-lock.json` ter-commit & sinkron. |
| Tidak bisa konek DB | Pastikan `DB_*` memakai reference `${{MySQL.*}}` dan service MySQL aktif. |

## Catatan
- Server memakai `php artisan serve` (cukup untuk demo/tugas). Untuk traffic besar,
  bisa diupgrade ke FrankenPHP/nginx nanti.
- Gambar yang diupload lewat admin tersimpan di Volume; jangan hapus Volume kalau tak
  ingin kehilangannya.
