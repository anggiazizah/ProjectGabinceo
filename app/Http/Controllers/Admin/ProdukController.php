<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProdukRequest;
use App\Models\Produk;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProdukController extends Controller
{
    public function index(Request $request)
    {
        $produk = Produk::when($request->q, function ($query, $q) {
            $query->whereRaw('LOWER(nama) LIKE ?', ['%' . mb_strtolower($q) . '%']);
        })
        ->orderBy('nama')
        ->paginate(10)
        ->withQueryString();

        return view('admin.produk.index', compact('produk'));
    }

    public function create()
    {
        return view('admin.produk.create');
    }

    public function store(ProdukRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('produk', 'public');
        }

        Produk::create($data);

        return redirect()->route('admin.produk.index')
            ->with('status', 'Produk berhasil ditambahkan.');
    }

    public function edit(Produk $produk)
    {
        return view('admin.produk.edit', compact('produk'));
    }

    public function update(ProdukRequest $request, Produk $produk)
    {
        $data = $request->validated();

        if ($request->hasFile('foto')) {
            if ($produk->foto) {
                Storage::disk('public')->delete($produk->foto);
            }
            $data['foto'] = $request->file('foto')->store('produk', 'public');
        }

        $produk->update($data);

        return redirect()->route('admin.produk.index')
            ->with('status', 'Produk berhasil diperbarui.');
    }

    public function destroy(Produk $produk)
    {
        try {
            $produk->delete();
        } catch (QueryException $e) {
            return back()->with('error', 'Produk tidak bisa dihapus karena sudah dipakai transaksi.');
        }

        if ($produk->foto) {
            Storage::disk('public')->delete($produk->foto);
        }

        return redirect()->route('admin.produk.index')
            ->with('status', 'Produk berhasil dihapus.');
    }
}
