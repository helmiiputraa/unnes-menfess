<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Seed marketplace categories.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Elektronik',
                'icon' => '📱',
                'description' => 'Gadget, laptop, aksesoris elektronik',
                'children' => [
                    ['name' => 'Handphone & Tablet', 'icon' => '📱', 'description' => 'HP, tablet, dan aksesoris'],
                    ['name' => 'Laptop & Komputer', 'icon' => '💻', 'description' => 'Laptop, PC, dan komponen'],
                    ['name' => 'Audio & Earphone', 'icon' => '🎧', 'description' => 'Earphone, headphone, speaker'],
                    ['name' => 'Aksesoris Elektronik', 'icon' => '🔌', 'description' => 'Charger, kabel, adapter'],
                ],
            ],
            [
                'name' => 'Fashion',
                'icon' => '👕',
                'description' => 'Pakaian, sepatu, dan aksesoris fashion',
                'children' => [
                    ['name' => 'Pakaian Pria', 'icon' => '👔', 'description' => 'Kaos, kemeja, celana pria'],
                    ['name' => 'Pakaian Wanita', 'icon' => '👗', 'description' => 'Dress, blouse, celana wanita'],
                    ['name' => 'Sepatu & Sandal', 'icon' => '👟', 'description' => 'Sneakers, sandal, sepatu formal'],
                    ['name' => 'Tas & Dompet', 'icon' => '👜', 'description' => 'Tas ransel, sling bag, dompet'],
                    ['name' => 'Aksesoris', 'icon' => '💍', 'description' => 'Jam tangan, kacamata, perhiasan'],
                ],
            ],
            [
                'name' => 'Buku & Alat Tulis',
                'icon' => '📚',
                'description' => 'Buku kuliah, novel, dan perlengkapan tulis',
                'children' => [
                    ['name' => 'Buku Kuliah', 'icon' => '📖', 'description' => 'Textbook, diktat, modul'],
                    ['name' => 'Novel & Non-Fiksi', 'icon' => '📕', 'description' => 'Novel, self-improvement, referensi'],
                    ['name' => 'Alat Tulis', 'icon' => '✏️', 'description' => 'Pensil, pulpen, penggaris, dll'],
                ],
            ],
            [
                'name' => 'Kos & Properti',
                'icon' => '🏠',
                'description' => 'Info kos, kontrakan, dan properti sekitar kampus',
                'children' => [
                    ['name' => 'Kos Putra', 'icon' => '🏠', 'description' => 'Info kos khusus putra'],
                    ['name' => 'Kos Putri', 'icon' => '🏡', 'description' => 'Info kos khusus putri'],
                    ['name' => 'Kos Campur', 'icon' => '🏘️', 'description' => 'Info kos campur'],
                    ['name' => 'Kontrakan', 'icon' => '🏢', 'description' => 'Rumah kontrakan, apartment'],
                ],
            ],
            [
                'name' => 'Kendaraan',
                'icon' => '🏍️',
                'description' => 'Motor, sepeda, dan aksesoris kendaraan',
                'children' => [
                    ['name' => 'Motor', 'icon' => '🏍️', 'description' => 'Motor bekas dan baru'],
                    ['name' => 'Sepeda', 'icon' => '🚲', 'description' => 'Sepeda dan aksesoris'],
                    ['name' => 'Aksesoris Kendaraan', 'icon' => '🔧', 'description' => 'Helm, sarung tangan, dll'],
                ],
            ],
            [
                'name' => 'Makanan & Minuman',
                'icon' => '🍔',
                'description' => 'Makanan, minuman, dan snack',
                'children' => [
                    ['name' => 'Makanan Berat', 'icon' => '🍛', 'description' => 'Nasi, mie, lauk pauk'],
                    ['name' => 'Snack & Cemilan', 'icon' => '🍿', 'description' => 'Keripik, kue, permen'],
                    ['name' => 'Minuman', 'icon' => '🧋', 'description' => 'Kopi, teh, jus, boba'],
                    ['name' => 'Kue & Roti', 'icon' => '🎂', 'description' => 'Kue ulang tahun, roti, pastry'],
                ],
            ],
            [
                'name' => 'Jasa',
                'icon' => '🛠️',
                'description' => 'Jasa tugas, desain, fotografi, dll',
                'children' => [
                    ['name' => 'Jasa Ketik & Tugas', 'icon' => '📝', 'description' => 'Ketik skripsi, tugas, laporan'],
                    ['name' => 'Jasa Desain', 'icon' => '🎨', 'description' => 'Desain grafis, poster, banner'],
                    ['name' => 'Jasa Fotografi', 'icon' => '📸', 'description' => 'Foto wisuda, event, produk'],
                    ['name' => 'Jasa Programming', 'icon' => '💻', 'description' => 'Pembuatan website, app, coding'],
                    ['name' => 'Les & Kursus', 'icon' => '📋', 'description' => 'Les privat, kursus online'],
                    ['name' => 'Jasa Lainnya', 'icon' => '🔧', 'description' => 'Servis, reparasi, dll'],
                ],
            ],
            [
                'name' => 'Olahraga & Hobi',
                'icon' => '⚽',
                'description' => 'Peralatan olahraga dan hobi',
                'children' => [
                    ['name' => 'Peralatan Olahraga', 'icon' => '🏸', 'description' => 'Raket, bola, sepatu olahraga'],
                    ['name' => 'Alat Musik', 'icon' => '🎸', 'description' => 'Gitar, keyboard, ukulele'],
                    ['name' => 'Gaming', 'icon' => '🎮', 'description' => 'Console, game, aksesoris gaming'],
                ],
            ],
            [
                'name' => 'Lainnya',
                'icon' => '📦',
                'description' => 'Barang lain yang tidak masuk kategori',
            ],
        ];

        $now = now();
        $sortOrder = 0;

        foreach ($categories as $category) {
            $children = $category['children'] ?? [];
            unset($category['children']);

            $parentId = DB::table('categories')->insertGetId([
                'name' => $category['name'],
                'slug' => Str::slug($category['name']),
                'icon' => $category['icon'],
                'description' => $category['description'],
                'parent_id' => null,
                'sort_order' => $sortOrder++,
                'is_active' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ]);

            $childSortOrder = 0;
            foreach ($children as $child) {
                DB::table('categories')->insert([
                    'name' => $child['name'],
                    'slug' => Str::slug($child['name']),
                    'icon' => $child['icon'],
                    'description' => $child['description'],
                    'parent_id' => $parentId,
                    'sort_order' => $childSortOrder++,
                    'is_active' => true,
                    'created_at' => $now,
                    'updated_at' => $now,
                ]);
            }
        }

        $this->command->info('✅ Categories seeded: ' . $sortOrder . ' parent categories with children');
    }
}
