<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'kd_barang' => 'BRG001',
            'nama_barang' => 'Beras Premium',
            'jenis_barang' => 'Bahan Pokok',
            'tgl_expired' => now()->addMonths(6),
            'harga_jual' => 50000,
            'stok' => 100,
            'foto_barang' => 'https://example.com/beras.jpg',
        ]);

        Product::create([
            'kd_barang' => 'BRG002',
            'nama_barang' => 'Minyak Goreng',
            'jenis_barang' => 'Bahan Pokok',
            'tgl_expired' => now()->addMonths(12),
            'harga_jual' => 25000,
            'stok' => 50,
            'foto_barang' => 'https://example.com/minyak.jpg',
        ]);

        Product::create([
            'kd_barang' => 'BRG003',
            'nama_barang' => 'Gula Pasir',
            'jenis_barang' => 'Bahan Pokok',
            'tgl_expired' => now()->addMonths(24),
            'harga_jual' => 15000,
            'stok' => 75,
            'foto_barang' => 'https://example.com/gula.jpg',
        ]);
    }
}
