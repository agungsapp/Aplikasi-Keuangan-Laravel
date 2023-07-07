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
                'name' => 'Nastar',
                'harga' => 43000,
            ],
            [
                'kode' => 'KD-2',
                'name' => 'Putri Salju',
                'harga' => 35000,
            ],
            [
                'kode' => 'KD-3',
                'name' => 'Chococip',
                'harga' => 35000,
            ],
            [
                'kode' => 'KD-4',
                'name' => 'Kacang Coklat',
                'harga' => 35000,
            ],
            [
                'kode' => 'KD-5',
                'name' => 'Ring Keju',
                'harga' => 35000,
            ],
            [
                'kode' => 'KD-6',
                'name' => 'Corn Flex',
                'harga' => 35000,
            ],
            [
                'kode' => 'KD-7',
                'name' => 'Nastar',
                'harga' => 43000,
            ],
            [
                'kode' => 'KD-8',
                'name' => 'Chococip',
                'harga' => 43000,
            ],
            [
                'kode' => 'KD-9',
                'name' => 'Putri Salju',
                'harga' => 43000,
            ],
            [
                'kode' => 'KD-10',
                'name' => 'Ring Keju',
                'harga' => 43000,
            ],
            [
                'kode' => 'KD-11',
                'name' => 'Kacang Coklat',
                'harga' => 43000,
            ],
            [
                'kode' => 'KD-12',
                'name' => 'Kastangel',
                'harga' => 43000,
            ],
            [
                'kode' => 'KD-13',
                'name' => 'Batang Coklat',
                'harga' => 43000,
            ],
            [
                'kode' => 'KD-14',
                'name' => 'Paket Idul Fitri',
                'harga' => 125000,
            ],
            [
                'kode' => 'KD-15',
                'name' => 'Ring Keju',
                'harga' => 42000,
            ],
            [
                'kode' => 'KD-16',
                'name' => 'Chococip',
                'harga' => 42000,
            ],
            [
                'kode' => 'KD-17',
                'name' => 'Corn Flex',
                'harga' => 42000,
            ],
            [
                'kode' => 'KD-18',
                'name' => 'Kacang Coklat',
                'harga' => 42000,
            ],
            [
                'kode' => 'KD-19',
                'name' => 'Putri Salju',
                'harga' => 42000,
            ],
            [
                'kode' => 'KD-20',
                'name' => 'Nastar',
                'harga' => 42000,
            ],
            [
                'kode' => 'KD-21',
                'name' => 'Coklat Batang',
                'harga' => 35000,
            ],
            [
                'kode' => 'KD-22',
                'name' => 'Cron Flex',
                'harga' => 35000,
            ],
            [
                'kode' => 'KD-23',
                'name' => 'Chococip',
                'harga' => 35000,
            ],
            [
                'kode' => 'KD-24',
                'name' => 'Kacang Coklat',
                'harga' => 35000,
            ],
            [
                'kode' => 'KD-25',
                'name' => 'Nastar',
                'harga' => 35000,
            ],
            [
                'kode' => 'KD-26',
                'name' => 'Ring Keju',
                'harga' => 35000,
            ],
            [
                'kode' => 'KD-27',
                'name' => 'Corn Flex',
                'harga' => 35000,
            ],
            [
                'kode' => 'KD-28',
                'name' => 'Chococip',
                'harga' => 35000,
            ],
            [
                'kode' => 'KD-29',
                'name' => 'Kacang Coklat',
                'harga' => 35000,
            ],
            [
                'kode' => 'KD-30',
                'name' => 'Putri Salju',
                'harga' => 35000,
            ],
            [
                'kode' => 'KD-31',
                'name' => 'Nastar',
                'harga' => 40000,
            ],
            [
                'kode' => 'KD-32',
                'name' => 'Chococip',
                'harga' => 40000,
            ],
            [
                'kode' => 'KD-33',
                'name' => 'Corn Flex',
                'harga' => 40000,
            ],
            [
                'kode' => 'KD-34',
                'name' => 'Putri Salju',
                'harga' => 40000,
            ],
            [
                'kode' => 'KD-35',
                'name' => 'Ring Keju',
                'harga' => 40000,
            ],
            [
                'kode' => 'KD-36',
                'name' => 'Kacang Coklat',
                'harga' => 40000,
            ],
            [
                'kode' => 'KD-37',
                'name' => 'Kastangel',
                'harga' => 40000,
            ],
            [
                'kode' => 'KD-38',
                'name' => 'Batang Coklat',
                'harga' => 40000,
            ],
            [
                'kode' => 'KD-39',
                'name' => 'Kacang Coklat',
                'harga' => 40000,
            ],
            [
                'kode' => 'KD-40',
                'name' => 'Chococip',
                'harga' => 40000,
            ],
            [
                'kode' => 'KD-41',
                'name' => 'Putri Salju',
                'harga' => 40000,
            ],
            [
                'kode' => 'KD-42',
                'name' => 'Nastar',
                'harga' => 40000,
            ],
            [
                'kode' => 'KD-43',
                'name' => 'Skippy',
                'harga' => 40000,
            ],
            [
                'kode' => 'KD-44',
                'name' => 'Ring Keju',
                'harga' => 40000,
            ],
            [
                'kode' => 'KD-45',
                'name' => 'Corn Flex',
                'harga' => 35000,
            ],
            [
                'kode' => 'KD-46',
                'name' => 'Chococip',
                'harga' => 35000,
            ],
            [
                'kode' => 'KD-47',
                'name' => 'Kacang Coklat',
                'harga' => 35000,
            ],
            [
                'kode' => 'KD-48',
                'name' => 'Ring Keju',
                'harga' => 35000,
            ],
            [
                'kode' => 'KD-49',
                'name' => 'Putri Salju',
                'harga' => 35000,
            ],
            [
                'kode' => 'KD-50',
                'name' => 'Paket Idul Fitri',
                'harga' => 125000,
            ],
            [
                'kode' => 'KD-51',
                'name' => 'Kue Kering',
                'harga' => 30000,
            ],
            [
                'kode' => 'KD-52',
                'name' => 'Nastar',
                'harga' => 43000,
            ],
            [
                'kode' => 'KD-53',
                'name' => 'Putri Salju',
                'harga' => 40000,
            ],
            [
                'kode' => 'KD-54',
                'name' => 'Chococip',
                'harga' => 40000,
            ],
            [
                'kode' => 'KD-55',
                'name' => 'Ring Keju',
                'harga' => 40000,
            ],
            [
                'kode' => 'KD-56',
                'name' => 'Kacang Coklat',
                'harga' => 40000,
            ],
            [
                'kode' => 'KD-57',
                'name' => 'Skippy',
                'harga' => 40000,
            ],
            [
                'kode' => 'KD-58',
                'name' => 'Nastar',
                'harga' => 33000,
            ],
            [
                'kode' => 'KD-59',
                'name' => 'Ring Keju',
                'harga' => 33000,
            ],
            [
                'kode' => 'KD-60',
                'name' => 'Kacang Coklat',
                'harga' => 33000,
            ],
            [
                'kode' => 'KD-61',
                'name' => 'Putri Salju',
                'harga' => 33000,
            ],
            [
                'kode' => 'KD-62',
                'name' => 'Kue Kering Tabung',
                'harga' => 40000,
            ],
            [
                'kode' => 'KD-63',
                'name' => 'Paket Idul Fitri',
                'harga' => 125000,
            ],
            [
                'kode' => 'KD-64',
                'name' => 'Nastar',
                'harga' => 35000,
            ],
            [
                'kode' => 'KD-65',
                'name' => 'Coklat Batang',
                'harga' => 35000,
            ],
            [
                'kode' => 'KD-66',
                'name' => 'Ring Keju',
                'harga' => 35000,
            ],
            [
                'kode' => 'KD-67',
                'name' => 'Corn Flex',
                'harga' => 35000,
            ],
            [
                'kode' => 'KD-68',
                'name' => 'Kacang Coklat',
                'harga' => 35000,
            ],
            [
                'kode' => 'KD-69',
                'name' => 'Chococip',
                'harga' => 35000,
            ],
            [
                'kode' => 'KD-70',
                'name' => 'Putri Salju',
                'harga' => 35000,
            ],
            [
                'kode' => 'KD-71',
                'name' => 'Nastar',
                'harga' => 40000,
            ],
            [
                'kode' => 'KD-72',
                'name' => 'Ring Keju',
                'harga' => 40000,
            ],
            [
                'kode' => 'KD-73',
                'name' => 'Chococip',
                'harga' => 40000,
            ],
            [
                'kode' => 'KD-74',
                'name' => 'Kacang Coklat',
                'harga' => 40000,
            ],
            [
                'kode' => 'KD-75',
                'name' => 'Putri Salju',
                'harga' => 40000,
            ],
            [
                'kode' => 'KD-76',
                'name' => 'Nastar',
                'harga' => 40000,
            ],
            [
                'kode' => 'KD-77',
                'name' => 'Skippy',
                'harga' => 40000,
            ],
            [
                'kode' => 'KD-78',
                'name' => 'Ring Keju',
                'harga' => 40000,
            ],
            [
                'kode' => 'KD-79',
                'name' => 'Corn Flex',
                'harga' => 40000,
            ],
            [
                'kode' => 'KD-80',
                'name' => 'Chococip',
                'harga' => 40000,
            ],
        ];

        foreach ($produkData as $key => $val) {
            ProdukModel::create($val);
        }
    }
}
