<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Admininstrador',
            'email' => 'admin@seventh.com',
            'id_grouppermissions' => 1,
            'password' => Hash::make('12345678'),
        ]);

        DB::table('users')->insert([
            'name' => 'userTeste',
            'email' => 'teste@teste.com',
            'id_grouppermissions' => 2,
            'password' => Hash::make('12345678'),
        ]);
    }
}
