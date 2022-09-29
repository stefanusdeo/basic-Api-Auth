<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ParamsSeeder extends Seeder
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
                'group' => 'role',
                'value' => 1
            ],
            [
                'name' => 'User',
                'group' => 'role',
                'value' => 2
            ],
        ];
        foreach ($data as $key) {
            DB::table('params')->insert($key);
        }
    }
}
