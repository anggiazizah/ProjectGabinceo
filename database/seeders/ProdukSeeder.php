<?php

namespace Database\Seeders;

use App\Models\Produk;
use Illuminate\Database\Seeder;

class ProdukSeeder extends Seeder
{
    public function run(): void
    {
        $varian = [
            ['nama' => 'Es Gabin Strawberry',         'harga' => 10000, 'stok' => 20],
            ['nama' => 'Es Gabin Matcha',             'harga' => 10000, 'stok' => 5],
            ['nama' => 'Es Gabin Cookies and Cream',  'harga' => 10000, 'stok' => 7],
            ['nama' => 'Es Gabin Mangga',             'harga' => 10000, 'stok' => 3],
            ['nama' => 'Es Gabin Ube',                'harga' => 10000, 'stok' => 2],
            ['nama' => 'Es Gabin Bubblegum',          'harga' => 10000, 'stok' => 8],
            ['nama' => 'Es Gabin Mint',               'harga' => 10000, 'stok' => 9],
            ['nama' => 'Es Gabin Coklat',             'harga' => 10000, 'stok' => 15],
            ['nama' => 'Es Gabin Matcha Ube',         'harga' => 10000, 'stok' => 18],
            ['nama' => 'Es Gabin Matcha Oreo',        'harga' => 10000, 'stok' => 7],
            ['nama' => 'Es Gabin Keju',               'harga' => 10000, 'stok' => 6],
        ];

        foreach ($varian as $v) {
            Produk::firstOrCreate(
                ['nama' => $v['nama']],
                ['harga' => $v['harga'], 'stok' => $v['stok']]
            );
        }
    }
}
