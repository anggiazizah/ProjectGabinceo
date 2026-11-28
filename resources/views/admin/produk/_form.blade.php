@csrf

<div class="mb-3">
    <label class="form-label">Nama Produk</label>
    <input type="text" name="nama" value="{{ old('nama', $produk->nama ?? '') }}"
           class="form-control @error('nama') is-invalid @enderror">
    @error('nama') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

<div class="mb-3">
    <label class="form-label">Deskripsi</label>
    <textarea name="deskripsi" rows="3"
              class="form-control @error('deskripsi') is-invalid @enderror">{{ old('deskripsi', $produk->deskripsi ?? '') }}</textarea>
    @error('deskripsi') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

<div class="row">
    <div class="col-md-6 mb-3">
        <label class="form-label">Harga (Rp)</label>
        <input type="number" name="harga" min="0" value="{{ old('harga', $produk->harga ?? '') }}"
               class="form-control @error('harga') is-invalid @enderror">
        @error('harga') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
    <div class="col-md-6 mb-3">
        <label class="form-label">Stok</label>
        <input type="number" name="stok" min="0" value="{{ old('stok', $produk->stok ?? 0) }}"
               class="form-control @error('stok') is-invalid @enderror">
        @error('stok') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
</div>

<div class="mb-3">
    <label class="form-label">Foto</label>
    @if (!empty($produk->foto))
        <div class="mb-2">
            <img src="{{ asset('storage/' . $produk->foto) }}" alt="{{ $produk->nama }}" class="img-thumbnail" style="width:120px">
        </div>
    @endif
    <input type="file" name="foto" accept="image/*"
           class="form-control @error('foto') is-invalid @enderror">
    @error('foto') <div class="invalid-feedback">{{ $message }}</div> @enderror
    @if (!empty($produk->foto))
        <div class="form-text">Kosongkan kalau tidak ingin mengganti foto.</div>
    @endif
</div>

<button type="submit" class="btn btn-primary">Simpan</button>
<a href="{{ route('admin.produk.index') }}" class="btn btn-secondary">Batal</a>
