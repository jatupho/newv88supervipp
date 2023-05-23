<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('locations')->insert([
            [
                'name' => 'iship1',
                'detail' => 'iship สาขาสายไหม',
                'logo' => 'https://media.jobthai.com/v1/images/logo-pic-map/286848_pic_20211123124157.jpeg',
                'lat' => '13.9213',
                'lng' => '100.672',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'iship2',
                'detail' => 'iship สาขาประเวศ',
                'logo' => 'https://iship.co.th/wp-content/uploads/2022/03/banner-1.jpg',
                'lat' => '13.7288',
                'lng' => '100.694',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
