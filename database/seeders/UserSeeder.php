<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [[
            'email' => 'bendaharainti@gmail.com',
            'fullname' => 'nuraini rachma ardianti',
            'kategori_id' => 1,
            'password' => Hash::make('inti'),
            'nim' => '1202189284',
            'divisi' => 'inti',
        ],[
            'email' => 'bendaharabiro@gmail.com',
            'fullname' => 'emma watson',
            'kategori_id' => 2,
            'password' => Hash::make('biro'),
            'nim' => '1202184821',
            'divisi' => 'entrepreneur',
        ]];
        DB::table('users')->insert($users);
    }
}
