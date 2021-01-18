<?php

use App\Models\Hostel;
use App\Models\School;
use Illuminate\Database\Seeder;

// composer require laracasts/testdummy
use Laracasts\TestDummy\Factory as TestDummy;

class HostelTableSeeder extends Seeder
{
    public function run()
    {


        $hostels =
        [
            [
                'name' => 'African Union Hall (Pentagon Hostel)',
                'address' => 'Legon Boundary, Accra',
                'lat' => '5.6568355',
                'lng' => '-0.1815146',
                'school_id' => School::where('name', 'University of Legon Ghana')->first()->id,
            ],
            [
                'name' => 'Mensa Sarbah Annex A Block',
                'address' => 'Legon Boundary, Accra',
                'lat' => '5.6461919',
                'lng' => '-0.185254',
                'school_id' => School::where('name', 'Presbyterian Boys Secondary School')->first()->id,
            ]
        ]
        ;
        foreach($hostels as $h){
            Hostel::create($h);
        }

    }
}
