# Dockerfile untuk deploy Laravel (PHP 8.2) ke Railway.
# Build: install dependency PHP + Node, compile asset Vite, siapkan runtime.

FROM php:8.2-cli AS app

# 1) System deps + ekstensi PHP yang dibutuhkan Laravel & MySQL
RUN apt-get update && apt-get install -y --no-install-recommends \
        git unzip curl ca-certificates gnupg \
        libzip-dev libpng-dev libjpeg-dev libfreetype6-dev libonig-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j"$(nproc)" pdo_mysql mbstring bcmath gd zip \
    && rm -rf /var/lib/apt/lists/*

# 2) Composer (disalin dari image resmi)
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# 3) Node.js 20 (untuk `npm run build` / Vite)
RUN curl -fsSL https://deb.nodesource.com/setup_20.x | bash - \
    && apt-get install -y --no-install-recommends nodejs \
    && rm -rf /var/lib/apt/lists/*

WORKDIR /app

# 4) Salin seluruh source (vendor/node_modules dikecualikan via .dockerignore)
COPY . .

# 5) Install dependency PHP (produksi) + build asset front-end, lalu bersihkan node_modules
RUN composer install --no-dev --optimize-autoloader --no-interaction --prefer-dist \
    && npm ci \
    && npm run build \
    && rm -rf node_modules

# 6) Pastikan direktori writable & start script bisa dieksekusi
RUN chmod +x docker/start.sh \
    && chmod -R 775 storage bootstrap/cache

EXPOSE 8080

# Runtime: migrasi + cache + jalankan server (lihat docker/start.sh)
CMD ["bash", "docker/start.sh"]
