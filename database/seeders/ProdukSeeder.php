<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kategori;
use App\Models\Produk;

class ProdukSeeder extends Seeder
{
    public function run(): void
    {
        $produk = [
            [
                'kategori' => 'Graduation',
                'nama_produk' => 'Rose Graduation',
                'deskripsi' => 'Buket mawar cantik untuk merayakan kelulusan.',
                'harga' => 150000,
                'stok' => 15,
                'warna_bunga' => 'Pink',
                'occasion' => 'Graduation',
                'is_featured' => true,
                'is_best_seller' => true,
            ],
            [
                'kategori' => 'Birthday',
                'nama_produk' => 'Pink Blossom',
                'deskripsi' => 'Rangkaian bunga pink untuk hadiah ulang tahun.',
                'harga' => 125000,
                'stok' => 10,
                'warna_bunga' => 'Pink',
                'occasion' => 'Birthday',
                'is_featured' => true,
                'is_best_seller' => false,
            ],
            [
                'kategori' => 'Anniversary',
                'nama_produk' => 'Sweet Romance',
                'deskripsi' => 'Buket romantis untuk orang tersayang.',
                'harga' => 200000,
                'stok' => 8,
                'warna_bunga' => 'Red',
                'occasion' => 'Anniversary',
                'is_featured' => true,
                'is_best_seller' => true,
            ],
            [
                'kategori' => 'Wedding',
                'nama_produk' => 'White Elegance',
                'deskripsi' => 'Rangkaian bunga putih yang elegan.',
                'harga' => 250000,
                'stok' => 5,
                'warna_bunga' => 'White',
                'occasion' => 'Wedding',
                'is_featured' => false,
                'is_best_seller' => false,
            ],
            [
                'kategori' => 'Custom Bouquet',
                'nama_produk' => 'Pastel Dream',
                'deskripsi' => 'Buket pastel dengan kombinasi bunga pilihan.',
                'harga' => 175000,
                'stok' => 12,
                'warna_bunga' => 'Pastel',
                'occasion' => 'Gift',
                'is_featured' => true,
                'is_best_seller' => false,
            ],
        ];

        foreach ($produk as $item) {
            $kategori = Kategori::where('nama_kategori', $item['kategori'])->firstOrFail();

            unset($item['kategori']);
            $item['kategori_id'] = $kategori->id;

            Produk::create($item);
        }
    }
}
