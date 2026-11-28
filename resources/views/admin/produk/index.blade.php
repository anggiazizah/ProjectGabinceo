@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="mb-0">Data Produk</h4>
        <a href="{{ route('admin.produk.create') }}" class="btn btn-primary">+ Tambah Produk</a>
    </div>

    @if (session('status'))
        <div class="alert alert-success">{{ session('status') }}</div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <form method="GET" class="row g-2 mb-3">
        <div class="col-md-4">
            <input type="text" name="q" value="{{ request('q') }}" class="form-control" placeholder="Cari nama produk...">
        </div>
        <div class="col-auto">
            <button class="btn btn-outline-secondary">Cari</button>
            @if (request('q'))
                <a href="{{ route('admin.produk.index') }}" class="btn btn-link">Reset</a>
            @endif
        </div>
    </form>

    <div class="table-responsive">
        <table class="table table-bordered align-middle">
            <thead class="table-light">
                <tr>
                    <th style="width:60px">#</th>
                    <th style="width:90px">Foto</th>
                    <th>Nama</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th style="width:160px">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($produk as $p)
                    <tr>
                        <td>{{ $produk->firstItem() + $loop->index }}</td>
                        <td>
                            @if ($p->foto)
                                <img src="{{ asset('storage/' . $p->foto) }}" alt="{{ $p->nama }}" class="img-thumbnail" style="width:70px;height:70px;object-fit:cover">
                            @else
                                <span class="text-muted">-</span>
                            @endif
                        </td>
                        <td>{{ $p->nama }}</td>
                        <td>Rp {{ number_format($p->harga, 0, ',', '.') }}</td>
                        <td>{{ $p->stok }}</td>
                        <td>
                            <a href="{{ route('admin.produk.edit', $p) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('admin.produk.destroy', $p) }}" method="POST" class="d-inline"
                                  onsubmit="return confirm('Hapus produk ini?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center text-muted">Belum ada data produk.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{ $produk->links() }}
</div>
@endsection
