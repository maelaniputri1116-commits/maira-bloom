
@php
    $editing = isset($produk);
@endphp

<form
    action="{{ $editing ? route('admin.produk.update', $produk->id) : route('admin.produk.store') }}"
    method="POST"
    enctype="multipart/form-data">

    @csrf

    @if($editing)
        @method('PUT')
    @endif

    <div class="row g-4">

        <div class="col-lg-8">
            <div class="admin-panel">

                <h5 class="mb-4">Informasi Produk</h5>

                <div class="mb-3">
                    <label class="form-label">Nama Produk *</label>
                    <input type="text" name="nama_produk"
                           class="form-control"
                           value="{{ old('nama_produk', $produk->nama_produk ?? '') }}"
                           placeholder="Contoh: Pink Blossom" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Kategori *</label>
                    <select name="kategori_id" class="form-select" required>
                        <option value="">Pilih kategori</option>

                        @foreach($kategoris as $kategori)
                            <option value="{{ $kategori->id }}"
                                {{ old('kategori_id', $produk->kategori_id ?? '') == $kategori->id ? 'selected' : '' }}>
                                {{ $kategori->nama_kategori }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Deskripsi Produk *</label>
                    <textarea name="deskripsi" class="form-control" rows="5"
                              placeholder="Jelaskan detail rangkaian bunga..."
                              required>{{ old('deskripsi', $produk->deskripsi ?? '') }}</textarea>
                </div>

                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Harga (Rp) *</label>
                        <input type="number" name="harga" min="1000"
                               class="form-control"
                               value="{{ old('harga', $produk->harga ?? '') }}"
                               placeholder="150000" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Stok *</label>
                        <input type="number" name="stok" min="0"
                               class="form-control"
                               value="{{ old('stok', $produk->stok ?? 0) }}"
                               placeholder="10" required>
                    </div>
                </div>

                <div class="row g-3 mt-1">
                    <div class="col-md-6">
                        <label class="form-label">Warna Bunga</label>
                        <input type="text" name="warna_bunga"
                               class="form-control"
                               value="{{ old('warna_bunga', $produk->warna_bunga ?? '') }}"
                               placeholder="Pink, White, Pastel...">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Occasion / Acara</label>
                        <input type="text" name="occasion"
                               class="form-control"
                               value="{{ old('occasion', $produk->occasion ?? '') }}"
                               placeholder="Birthday, Graduation...">
                    </div>
                </div>

            </div>
        </div>

        <div class="col-lg-4">
            <div class="admin-panel">

                <h5 class="mb-3">Foto Produk</h5>

                @if($editing && $produk->foto)
                    <img src="{{ asset('storage/' . $produk->foto) }}"
                         class="w-100 rounded-3 mb-3"
                         style="height:210px;object-fit:cover;"
                         alt="Foto produk saat ini">
                @elseif($editing)
                    <div class="alert alert-light small">
                        Produk ini belum memiliki foto hasil upload.
                    </div>
                @endif

                <input type="file" name="foto" class="form-control"
                       accept=".jpg,.jpeg,.png,.webp">

                <small class="text-muted d-block mt-2">
                    Format JPG, JPEG, PNG, atau WEBP. Maksimal 2 MB.
                    Kosongkan jika tidak ingin mengganti foto.
                </small>

                <hr class="my-4">

                <h6 class="mb-3">Pengaturan Tampilan</h6>

                <div class="form-check mb-3">
                    <input type="checkbox" name="is_featured" value="1"
                           class="form-check-input" id="featured"
                           {{ old('is_featured', $produk->is_featured ?? false) ? 'checked' : '' }}>
                    <label class="form-check-label" for="featured">
                        Produk unggulan
                    </label>
                </div>

                <div class="form-check">
                    <input type="checkbox" name="is_best_seller" value="1"
                           class="form-check-input" id="bestSeller"
                           {{ old('is_best_seller', $produk->is_best_seller ?? false) ? 'checked' : '' }}>
                    <label class="form-check-label" for="bestSeller">
                        Best seller
                    </label>
                </div>

            </div>
        </div>

    </div>

    <div class="d-flex justify-content-end gap-2 mt-4">
        <a href="{{ route('admin.produk.index') }}" class="btn btn-soft px-4">
            Batal
        </a>

        <button type="submit" class="btn-maira">
            <i class="bi bi-check-lg me-1"></i>
            {{ $editing ? 'Simpan Perubahan' : 'Simpan Produk' }}
        </button>
    </div>

</form>
