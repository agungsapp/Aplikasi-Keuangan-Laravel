<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $userData = [
            [
                'name' => 'administrator',
                'username' => 'admin',
                'email' => 'admin@gmail.com',
                'role' => 'admin',
                'password' => bcrypt('123')
            ],
            [
                'name' => 'staff',
                'username' => 'staff',
                'email' => 'staff@gmail.com',
                'role' => 'staff',
                'password' => bcrypt('123')
            ]
        ];


        foreach ($userData as $key => $val) {
            User::create($val);
        }
    }
}
