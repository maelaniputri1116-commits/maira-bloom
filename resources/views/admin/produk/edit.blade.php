
@extends('layouts.admin')

@section('title', 'Edit Produk - MAIRA BLOOM')
@section('breadcrumb', 'Edit Produk')

<div class="mb-4">
    <div class="page-heading">Edit Produk</div>
    <div class="page-subtitle">Perbarui informasi produk {{ $produk->nama_produk }}.</div>
</div>

@include('admin.produk.form')

@endsection
