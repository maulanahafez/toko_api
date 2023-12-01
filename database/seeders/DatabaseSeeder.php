<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\BukuTamu;
use App\Models\Mahasiswa;
use App\Models\Produk;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'username' => 'admin',
            'password' => 'admin'
        ]);

        BukuTamu::factory()->count(10)->create();
    }
}

/**
 * database/migrations/2014_10_12_000000_create_users_table.php
 * database/migrations/2023_12_01_103824_create_buku_tamus_table.php
 */
