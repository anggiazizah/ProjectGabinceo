@extends('layouts.app')

@section('content')
<div class="container" style="max-width:700px">
    <h4 class="mb-3">Edit Produk</h4>
    <form action="{{ route('admin.produk.update', $produk) }}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @include('admin.produk._form')
    </form>
</div>
@endsection
