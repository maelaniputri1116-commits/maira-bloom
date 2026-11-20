
@extends('layouts.admin')

@section('title', 'Tambah Produk - MAIRA BLOOM')
@section('breadcrumb', 'Tambah Produk')

@section('content')

<div class="mb-4">
    <div class="page-heading">Tambah Produk Baru</div>
    <div class="page-subtitle">Masukkan informasi produk bunga ke katalog MAIRA BLOOM.</div>
</div>

@include('admin.produk.form')

@endsection
