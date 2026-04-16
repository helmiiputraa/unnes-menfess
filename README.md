# UNNES Menfess

Platform menfess (mengirim pesan anonim) untuk mahasiswa UNNES.

## Tech Stack

- **Backend:** Laravel 12
- **Frontend:** Tailwind CSS v4 (via Vite)
- **Database:** PostgreSQL
- **Build Tool:** Vite

## Prerequisites

Pastikan sudah menginstall:

- PHP >= 8.2
- Composer
- Node.js >= 18
- PostgreSQL >= 14

## Setup Project

### 1. Clone Repository

```bash
git clone https://github.com/<username>/unnes-menfess.git
cd unnes-menfess
```

### 2. Install Dependencies

```bash
composer install
npm install
```

### 3. Konfigurasi Environment

```bash
cp .env.example .env
php artisan key:generate
```

Edit file `.env` dan sesuaikan konfigurasi database:

```env
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=unnes_menfess
DB_USERNAME=postgres
DB_PASSWORD=your_password_here
```

### 4. Buat Database

Buat database PostgreSQL dengan nama `unnes_menfess`:

```sql
CREATE DATABASE unnes_menfess;
```

### 5. Jalankan Migrasi

```bash
php artisan migrate
```

### 6. Jalankan Development Server

```bash
# Terminal 1 - Laravel
php artisan serve

# Terminal 2 - Vite (Tailwind CSS + Hot Reload)
npm run dev
```

Akses aplikasi di `http://localhost:8000`

## Struktur Folder

```
unnes-menfess/
├── app/              # Logic aplikasi (Models, Controllers, dll.)
├── bootstrap/        # Bootstrap framework
├── config/           # File konfigurasi
├── database/         # Migrations, seeders, factories
├── public/           # Entry point & aset publik
├── resources/        # Views (Blade), CSS, JS
│   ├── css/          # Tailwind CSS
│   ├── js/           # JavaScript
│   └── views/        # Blade templates
├── routes/           # Definisi routes
├── storage/          # File storage & cache
├── tests/            # Unit & feature tests
└── vite.config.js    # Konfigurasi Vite + Tailwind
```

## Development Guidelines

- Gunakan **feature branch** untuk setiap fitur baru
- Buat **Pull Request** untuk review sebelum merge ke `main`
- Jalankan `php artisan test` sebelum push
- Ikuti konvensi penamaan Laravel

## Tim

Dibuat oleh mahasiswa UNNES.
