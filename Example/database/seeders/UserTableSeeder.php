<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Database\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $data = [
            [
                'name'=>'qoanthoan',
                'password'=>bcrypt('123456'),
            ],
            [
                'name'=>'quangthuan',
                'password'=>bcrypt('1'),
            ],
        ];
        //DB::table('users')->insert($data);
        
    }
}
