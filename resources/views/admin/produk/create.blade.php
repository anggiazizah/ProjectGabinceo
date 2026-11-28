@extends('layouts.app')

@section('content')
<div class="container" style="max-width:700px">
    <h4 class="mb-3">Tambah Produk</h4>
    <form action="{{ route('admin.produk.store') }}" method="POST" enctype="multipart/form-data">
        @include('admin.produk._form')
    </form>
</div>
@endsection
