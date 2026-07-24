#!/usr/bin/env bash
# Dijalankan saat container start di Railway (env & database sudah tersedia).
set -e

echo "==> Menyiapkan direktori storage..."
mkdir -p \
  storage/app/public \
  storage/framework/sessions \
  storage/framework/cache/data \
  storage/framework/views \
  bootstrap/cache

echo "==> Membuat symlink storage (public/storage -> storage/app/public)..."
php artisan storage:link || true

echo "==> Menjalankan migrasi database..."
php artisan migrate --force

# PENTING: JANGAN pakai `route:cache` / `artisan optimize`.
# routes/web.php punya route closure (/dashboard) yang tidak bisa di-serialize.
echo "==> Cache config & view..."
php artisan config:cache
php artisan view:cache

echo "==> Menjalankan server di 0.0.0.0:${PORT:-8080}..."
php artisan serve --host 0.0.0.0 --port "${PORT:-8080}"
