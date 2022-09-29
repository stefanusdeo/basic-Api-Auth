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
        $data = [
            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('adminitbaru'),
                'role_id' => 1,
            ],
            [
                'name' => 'Deo',
                'email' => 'deo@gmail.com',
                'password' => Hash::make('adminitbaru'),
                'role_id' => 2,
            ]
        ];
        foreach ($data as $key) {
            DB::table('users')->insert($key);
        }
    }
}
