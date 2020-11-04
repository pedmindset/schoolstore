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
                "name" => "Emmanuel Oduro",
                "email" => "emmarthurson@gmail.com",
                "phone" => "0209000000",
                "address" => "Lizzy Sport Center",
            ],
            [
                "user_id" => 2,
                "name" => "Emmanuel Fache",
                "email" => "emrade95@gmail.com",
                "phone" => "0209000001",
                "address" => "Abeka, Lapaz.",
            ],
        ];

        foreach ($data as $d ) {
           Profile::create($d);
        }
    }
}
