<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Produk;
use App\Models\Kategori;

class DashboardController extends Controller
{
    public function index()
    {
        $totalProduk = Produk::count();
        $totalKategori = Kategori::count();
        $totalStok = Produk::sum('stok');
        $stokMenipis = Produk::where('stok', '<=', 5)->count();

        $produkTerbaru = Produk::with('kategori')
            ->latest()
            ->take(5)
            ->get();

        return view('admin.dashboard', compact(
            'totalProduk',
            'totalKategori',
            'totalStok',
            'stokMenipis',
            'produkTerbaru'
        ));
    }
}
