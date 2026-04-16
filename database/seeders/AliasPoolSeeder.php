<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AliasPoolSeeder extends Seeder
{
    /**
     * Seed alias pool dengan 100 kata sifat × 100 kata benda = 10.000 kombinasi.
     *
     * Sistem alias:
     * - Setiap room chat menfess, user mendapat alias unik yang berbeda
     * - Dalam 1 room chat, alias user tetap sama (konsisten)
     * - Pindah room chat lain = dapat alias baru
     */
    public function run(): void
    {
        $adjectives = [
            // Warna (20)
            'Merah', 'Biru', 'Hijau', 'Kuning', 'Ungu', 'Jingga', 'Pink', 'Putih', 'Hitam', 'Abu',
            'Emas', 'Perak', 'Coklat', 'Magenta', 'Indigo', 'Violet', 'Teal', 'Coral', 'Jade', 'Crimson',

            // Sifat positif (20)
            'Ceria', 'Berani', 'Bijak', 'Kreatif', 'Gesit', 'Lincah', 'Ramah', 'Cerdik', 'Tangguh', 'Setia',
            'Keren', 'Ajaib', 'Epik', 'Hebat', 'Gigih', 'Sabar', 'Jujur', 'Tekun', 'Anggun', 'Gagah',

            // Sifat lucu/unik (20)
            'Galak', 'Pemalu', 'Usil', 'Jahil', 'Nyeleneh', 'Receh', 'Gabut', 'Baper', 'Mager', 'Kepo',
            'Salty', 'Savage', 'Random', 'Santuy', 'Asik', 'Gokil', 'Mantap', 'Sultan', 'Cupu', 'Pro',

            // Sifat alam (20)
            'Dingin', 'Hangat', 'Panas', 'Sejuk', 'Lembut', 'Terang', 'Gelap', 'Segar', 'Liar', 'Langka',
            'Klasik', 'Modern', 'Retro', 'Mistis', 'Kosmik', 'Tropis', 'Arktik', 'Vulkanik', 'Lunar', 'Solar',

            // Sifat ukuran/bentuk (20)
            'Kecil', 'Besar', 'Mini', 'Mega', 'Super', 'Ultra', 'Mungil', 'Raksasa', 'Tinggi', 'Pendek',
            'Bulat', 'Lancip', 'Unik', 'Premium', 'Ekstra', 'Spesial', 'Rapih', 'Abstrak', 'Simetris', 'Original',
        ];

        $nouns = [
            // Hewan darat (20)
            'Kucing', 'Anjing', 'Gajah', 'Singa', 'Harimau', 'Beruang', 'Kelinci', 'Rubah', 'Serigala', 'Rusa',
            'Kuda', 'Panda', 'Koala', 'Kanguru', 'Hamster', 'Tupai', 'Landak', 'Musang', 'Badak', 'Domba',

            // Hewan terbang (15)
            'Elang', 'Rajawali', 'Merak', 'Kolibri', 'Gagak', 'Merpati', 'Kakatua', 'Beo',
            'Flamingo', 'Bangau', 'Camar', 'Kenari', 'Cendrawasih', 'Nuri', 'Kutilang',

            // Hewan air (10)
            'Hiu', 'Lumba', 'Paus', 'Gurita', 'Kepiting', 'Penyu', 'Pari', 'Koi', 'Arwana', 'Piranha',

            // Makanan Indonesia (25)
            'Bakso', 'Sate', 'Rendang', 'Tempe', 'Tahu', 'Siomay', 'Batagor', 'Cilok', 'Cireng', 'Martabak',
            'Donat', 'Mie', 'Soto', 'Rawon', 'Gudeg', 'Pecel', 'Rujak', 'Lumpia', 'Pempek', 'Klepon',
            'Onde', 'Cendol', 'Serabi', 'Gorengan', 'Ketoprak',

            // Benda langit/alam (15)
            'Bintang', 'Bulan', 'Matahari', 'Komet', 'Planet', 'Nebula', 'Aurora', 'Pelangi',
            'Awan', 'Petir', 'Hujan', 'Embun', 'Angin', 'Badai', 'Salju',

            // Benda sehari-hari (15)
            'Pensil', 'Buku', 'Kacamata', 'Payung', 'Lampu', 'Gelas', 'Kursi', 'Cermin',
            'Piano', 'Gitar', 'Kompas', 'Peta', 'Globe', 'Dadu', 'Kartu',
        ];

        $batchSize = 500;
        $batch = [];
        $now = now();

        foreach ($adjectives as $adjective) {
            foreach ($nouns as $noun) {
                $batch[] = [
                    'adjective' => $adjective,
                    'noun' => $noun,
                    'is_active' => true,
                    'created_at' => $now,
                    'updated_at' => $now,
                ];

                if (count($batch) >= $batchSize) {
                    DB::table('alias_pool')->insert($batch);
                    $batch = [];
                }
            }
        }

        // Insert remaining
        if (!empty($batch)) {
            DB::table('alias_pool')->insert($batch);
        }

        $this->command->info('✅ Alias pool seeded: ' . (count($adjectives) * count($nouns)) . ' combinations');
    }
}
