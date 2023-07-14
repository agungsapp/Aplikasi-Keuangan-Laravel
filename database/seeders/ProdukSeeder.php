<?php

namespace Database\Seeders;

use App\Models\ProdukModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $produkData = [
            [
                'kode' => 'KD-1',
                'name' => 'nastar',
                'jenis_toples' => 'bulat',
                'harga' => 45000,
            ],
            [
                'kode' => 'KD-3',
                'name' => 'nastar',
                'jenis_toples' => 'tabung',
                'harga' => 45000,
            ],
            [
                'kode' => 'KD-4',
                'name' => 'chocohip',
                'jenis_toples' => 'bulat',
                'harga' => 30000,
            ],
            [
                'kode' => 'KD-5',
                'name' => 'chocohip',
                'jenis_toples' => 'segi',
                'harga' => 33000,
            ],
            [
                'kode' => 'KD-6',
                'name' => 'chocohip',
                'jenis_toples' => 'tabung',
                'harga' => 45000,
            ],
            [
                'kode' => 'KD-7',
                'name' => 'skippy',
                'jenis_toples' => 'bulat',
                'harga' => 40000,
            ],
            [
                'kode' => 'KD-8',
                'name' => 'skippy',
                'jenis_toples' => 'segi',
                'harga' => 33000,
            ],
            [
                'kode' => 'KD-9',
                'name' => 'skippy',
                'jenis_toples' => 'tabung',
                'harga' => 45000,
            ],
            [
                'kode' => 'KD-10',
                'name' => 'ring keju',
                'jenis_toples' => 'bulat',
                'harga' => 40000,
            ],
            [
                'kode' => 'KD-11',
                'name' => 'putri salju',
                'jenis_toples' => 'bulat',
                'harga' => 40000,
            ],
        ];

        foreach ($produkData as $key => $val) {
            ProdukModel::create($val);
        }
    }
}
