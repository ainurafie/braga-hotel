<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Room;
use App\Models\RoomCategory;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        RoomCategory::create([
            'id'            => 1,
            'name'          => "Suite Class"
        ]);

        Room::create([
            'id'            => 1,
            'name'          => '101',
            'description'   => 'Ini adalah kamar nomor 101',
            'capacity'      => 2,
            'price'         => '150000.00',
            'category_id'   => 1,
        ]);

        Room::create([
            'id'            => 2,
            'name'          => '102',
            'description'   => 'Ini adalah kamar nomor 102',
            'capacity'      => 2,
            'price'         => '150000.00',
            'category_id'   => 1,
        ]);

        Room::create([
            'id'            => 3,
            'name'          => '103',
            'description'   => 'Ini adalah kamar nomor 103',
            'capacity'      => 2,
            'price'         => '150000.00',
            'category_id'   => 1,
        ]);

        Room::create([
            'id'            => 4,
            'name'          => '201',
            'description'   => 'Ini adalah kamar nomor 201',
            'capacity'      => 2,
            'price'         => '150000.00',
            'category_id'   => 1,
        ]);

        Room::create([
            'id'            => 5,
            'name'          => '202',
            'description'   => 'Ini adalah kamar nomor 202',
            'capacity'      => 2,
            'price'         => '150000.00',
            'category_id'   => 1,
        ]);

        Room::create([
            'id'            => 6,
            'name'          => '203',
            'description'   => 'Ini adalah kamar nomor 203',
            'capacity'      => 2,
            'price'         => '150000.00',
            'category_id'   => 1,
        ]);

        Room::create([
            'id'            => 7,
            'name'          => '205',
            'description'   => 'Ini adalah kamar nomor 205',
            'capacity'      => 2,
            'price'         => '150000.00',
            'category_id'   => 1,
        ]);

        Room::create([
            'id'            => 8,
            'name'          => '206',
            'description'   => 'Ini adalah kamar nomor 206',
            'capacity'      => 2,
            'price'         => '150000.00',
            'category_id'   => 1,
        ]);

        Room::create([
            'id'            => 9,
            'name'          => '301',
            'description'   => 'Ini adalah kamar nomor 301',
            'capacity'      => 2,
            'price'         => '150000.00',
            'category_id'   => 1,
        ]);

        Room::create([
            'id'            => 10,
            'name'          => '302',
            'description'   => 'Ini adalah kamar nomor 302',
            'capacity'      => 2,
            'price'         => '150000.00',
            'category_id'   => 1,
        ]);

        Room::create([
            'id'            => 11,
            'name'          => '303',
            'description'   => 'Ini adalah kamar nomor 303',
            'capacity'      => 2,
            'price'         => '150000.00',
            'category_id'   => 1,
        ]);

        Room::create([
            'id'            => 12,
            'name'          => '305',
            'description'   => 'Ini adalah kamar nomor 305',
            'capacity'      => 2,
            'price'         => '150000.00',
            'category_id'   => 1,
        ]);

        Room::create([
            'id'            => 13,
            'name'          => '306',
            'description'   => 'Ini adalah kamar nomor 306',
            'capacity'      => 2,
            'price'         => '150000.00',
            'category_id'   => 1,
        ]);
        
    }
}
