<?php

use App\Models\Profile;
use Illuminate\Database\Seeder;

class ProfilesTableSeeder extends Seeder
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
                "user_id" => 1,
                "phone" => "0209000000",
                "address" => "Lizzy Sport Center",
            ],
            [
                "user_id" => 2,
                "phone" => "0209000001",
                "address" => "Common Wealth Hall",
                "school_id" => 1,
                "hostel_id" => 1,
                "level" => "200",
                "room" => "Room 5",
                "lat" => "5.65683550",
                "lng" => "-0.18151460",
            ],
            [
                "user_id" => 3,
                "phone" => "0209000002",
            ],
        ];

        foreach ($data as $d) {
            Profile::create($d);
        }
    }
}
