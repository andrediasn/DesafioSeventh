<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class InitialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Permission seeders
        DB::table('permissions')->insert([
            'name' => 'Todas as permissões',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('permissions')->insert([
            'name' => 'Ver',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        
        DB::table('permissions')->insert([
            'name' => 'Salvar',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        
        DB::table('permissions')->insert([
            'name' => 'Editar',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('permissions')->insert([
            'name' => 'Deletar',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);


        // Group Permission Seeder
        DB::table('grouppermissions')->insert([
            'name' => 'Admin',
            'id_permission' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('grouppermissions')->insert([
            'name' => 'User',
            'id_permission' => 2,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        // User Seeders
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