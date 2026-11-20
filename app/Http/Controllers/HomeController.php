<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Kategori;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $produks = Produk::with('kategori')
            ->where('is_featured', true)
            ->latest()
            ->take(4)
            ->get();

        $kategoris = Kategori::withCount('produks')->get();

        return view('home', compact('produks', 'kategoris'));
    }

    public function collection(Request $request)
    {
        $query = Produk::with('kategori');

        if ($request->filled('kategori')) {
            $query->where('kategori_id', $request->kategori);
        }

        if ($request->filled('search')) {
            $query->where('nama_produk', 'like', '%' . $request->search . '%');
        }

        $produks = $query->latest()->paginate(8)->withQueryString();
        $kategoris = Kategori::all();

        return view('collection', compact('produks', 'kategoris'));
    }

    public function detail($id)
    {
        $produk = Produk::with('kategori')->findOrFail($id);

        $rekomendasi = Produk::where('kategori_id', $produk->kategori_id)
            ->where('id', '!=', $produk->id)
            ->take(3)
            ->get();

        return view('detail', compact('produk', 'rekomendasi'));
    }
}
