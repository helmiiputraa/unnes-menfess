<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create default admin user
        User::factory()->create([
            'name' => 'Admin',
            'username' => 'admin',
            'email' => 'admin@unnesmenfess.com',
            'role' => 'admin',
        ]);

        // Seed all data
        $this->call([
            AliasPoolSeeder::class,
            CategorySeeder::class,
            SettingSeeder::class,
        ]);
    }
}
