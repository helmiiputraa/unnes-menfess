<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AliasPoolSeeder extends Seeder
{
    /**
     * Seed alias pool dengan 150 kata sifat × 150 kata benda = 22.500 kombinasi.
     */
    public function run(): void
    {
        $adjectives = [
            // Warna (30)
            'Merah', 'Biru', 'Hijau', 'Kuning', 'Ungu', 'Jingga', 'Pink', 'Putih', 'Hitam', 'Abu',
            'Emas', 'Perak', 'Coklat', 'Krem', 'Magenta', 'Cyan', 'Indigo', 'Violet', 'Maroon', 'Teal',
            'Salmon', 'Mint', 'Lavender', 'Coral', 'Ivory', 'Crimson', 'Scarlet', 'Azure', 'Jade', 'Ruby',

            // Sifat positif (30)
            'Ceria', 'Berani', 'Bijak', 'Kreatif', 'Gesit', 'Lincah', 'Ramah', 'Cerdik', 'Tangguh', 'Setia',
            'Santai', 'Keren', 'Ajaib', 'Epik', 'Hebat', 'Gigih', 'Sabar', 'Jujur', 'Tekun', 'Ulet',
            'Sopan', 'Dermawan', 'Anggun', 'Elegan', 'Gagah', 'Kalem', 'Jenaka', 'Trendy', 'Sporty', 'Aktif',

            // Sifat lucu/unik (30)
            'Galak', 'Malu', 'Pemalu', 'Usil', 'Jahil', 'Nyeleneh', 'Absurd', 'Receh', 'Gabut', 'Baper',
            'Bucin', 'Mager', 'Rebahan', 'Kepo', 'Gercep', 'Salty', 'Savage', 'Ambigu', 'Random', 'Zonk',
            'Panik', 'Santuy', 'Asik', 'Seru', 'Gokil', 'Gas', 'Mantap', 'Sultan', 'Cupu', 'Pro',

            // Sifat alam (30)
            'Dingin', 'Hangat', 'Panas', 'Sejuk', 'Lembut', 'Keras', 'Terang', 'Gelap', 'Segar', 'Basah',
            'Kering', 'Beku', 'Liar', 'Jinak', 'Langka', 'Antik', 'Klasik', 'Modern', 'Retro', 'Vintage',
            'Mistis', 'Kosmik', 'Lunar', 'Solar', 'Tropis', 'Arktik', 'Gurun', 'Samudra', 'Vulkanik', 'Meteor',

            // Sifat ukuran/bentuk (30)
            'Kecil', 'Besar', 'Mini', 'Mega', 'Super', 'Ultra', 'Mungil', 'Raksasa', 'Tinggi', 'Pendek',
            'Lebar', 'Sempit', 'Tebal', 'Tipis', 'Bulat', 'Kotak', 'Lancip', 'Tumpul', 'Runcing', 'Melengkung',
            'Rapih', 'Berantakan', 'Simetris', 'Abstrak', 'Unik', 'Standar', 'Premium', 'Ekstra', 'Spesial', 'Original',
        ];

        $nouns = [
            // Hewan darat (30)
            'Kucing', 'Anjing', 'Gajah', 'Singa', 'Harimau', 'Beruang', 'Kelinci', 'Rubah', 'Serigala', 'Rusa',
            'Kuda', 'Zebra', 'Jerapah', 'Monyet', 'Gorila', 'Panda', 'Koala', 'Kanguru', 'Hamster', 'Tupai',
            'Landak', 'Musang', 'Rakun', 'Kijang', 'Badak', 'Kerbau', 'Kambing', 'Domba', 'Llama', 'Alpaka',

            // Hewan terbang (20)
            'Elang', 'Rajawali', 'Merak', 'Burung', 'Kolibri', 'Pelikan', 'Gagak', 'Merpati', 'Kakatua', 'Beo',
            'Flamingo', 'Bangau', 'Hantu', 'Camar', 'Walet', 'Kenari', 'Cendrawasih', 'Nuri', 'Jalak', 'Kutilang',

            // Hewan air (20)
            'Ikan', 'Hiu', 'Lumba', 'Paus', 'Gurita', 'Ubur', 'Kepiting', 'Udang', 'Penyu', 'Kuda Laut',
            'Pari', 'Belut', 'Lele', 'Salmon', 'Tuna', 'Nemo', 'Dory', 'Koi', 'Arwana', 'Piranha',

            // Makanan Indonesia (30)
            'Nasi', 'Bakso', 'Sate', 'Rendang', 'Gado', 'Tempe', 'Tahu', 'Ketoprak', 'Siomay', 'Batagor',
            'Cilok', 'Cireng', 'Gorengan', 'Martabak', 'Roti', 'Donat', 'Kue', 'Mie', 'Soto', 'Rawon',
            'Gudeg', 'Pecel', 'Rujak', 'Lumpia', 'Pempek', 'Kerak', 'Serabi', 'Klepon', 'Onde', 'Cendol',

            // Benda langit/alam (20)
            'Bintang', 'Bulan', 'Matahari', 'Komet', 'Planet', 'Galaksi', 'Nebula', 'Asteroid', 'Aurora', 'Pelangi',
            'Awan', 'Petir', 'Hujan', 'Salju', 'Embun', 'Angin', 'Badai', 'Topan', 'Tornado', 'Tsunami',

            // Benda sehari-hari (30)
            'Pensil', 'Buku', 'Tas', 'Sepatu', 'Topi', 'Kacamata', 'Jam', 'Kunci', 'Payung', 'Lampu',
            'Sendok', 'Garpu', 'Piring', 'Gelas', 'Botol', 'Kursi', 'Meja', 'Pintu', 'Jendela', 'Cermin',
            'Telepon', 'Radio', 'Piano', 'Gitar', 'Drum', 'Kompas', 'Peta', 'Globe', 'Dadu', 'Kartu',
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
