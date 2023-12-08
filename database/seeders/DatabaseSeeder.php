<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Criteria;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        Criteria::create([
            'motif' => 'Motif Kehidupan',
            'warna' => 'merah',
            'jenis_kain' => 'classic',
            'harga' => 500000,
            'image' => 'kehidupan.jpeg'
        ]);
        Criteria::create([
            'motif' => 'Motif Keris Bunga Matahari',
            'warna' => 'hitam',
            'jenis_kain' => 'katun',
            'harga' => 1000000,
            'image' => 'keris_bunga_matahari.jpeg'
        ]);
        Criteria::create([
            'motif' => 'Motif Demar Bhulen',
            'warna' => 'putih',
            'jenis_kain' => 'classic',
            'harga' => 500000,
            'image' => 'dhemar_bulen.jpeg'
        ]);
        Criteria::create([
            'motif' => 'Motif Malathe Satoor',
            'warna' => 'hijau',
            'jenis_kain' => 'katun',
            'harga' => 750000,
            'image' => 'malate_satoor.jpeg'
        ]);
        Criteria::create([
            'motif' => 'Motif Merak',
            'warna' => 'kuning',
            'jenis_kain' => 'classic',
            'harga' => 500000,
            'image' => 'merak_kuning.jpeg'
        ]);
        Criteria::create([
            'motif' => 'Motif Keraton',
            'warna' => 'biru',
            'jenis_kain' => 'katun',
            'harga' => 1000000,
            'image' => 'keraton.jpeg'
        ]);
    }
}
