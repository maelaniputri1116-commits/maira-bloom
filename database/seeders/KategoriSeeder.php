<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kategori;

class KategoriSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            ['nama_kategori' => 'Graduation', 'deskripsi' => 'Buket bunga untuk wisuda'],
            ['nama_kategori' => 'Birthday', 'deskripsi' => 'Buket bunga untuk ulang tahun'],
            ['nama_kategori' => 'Anniversary', 'deskripsi' => 'Buket bunga untuk hari spesial'],
            ['nama_kategori' => 'Wedding', 'deskripsi' => 'Rangkaian bunga untuk pernikahan'],
            ['nama_kategori' => 'Custom Bouquet', 'deskripsi' => 'Buket bunga sesuai keinginan'],
        ];

        foreach ($data as $item) {
            Kategori::create($item);
        }
    }
}
