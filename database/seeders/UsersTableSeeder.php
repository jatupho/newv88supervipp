<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'admin',
                'position' => 'ฝ่ายบุคคล',
                'role' => 'admin',
                'email' => 'admin@iship.co.th',
                'password' => bcrypt('123456'),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Sarawut Inree',
                'position' => 'พนักงานทั่วไป',
                'role' => 'user',
                'email' => 'sarawut.inree@gmail.com',
                'password' => bcrypt('11261992'),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'boot',
                'position' => 'พนักงานทั่วไป',
                'role' => 'user',
                'email' => '1@1.com',
                'password' => bcrypt('1'),
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
