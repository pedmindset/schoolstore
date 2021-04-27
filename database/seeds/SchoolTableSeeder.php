<?php

use App\Models\School;
use App\Models\SchoolCategory;
use Illuminate\Database\Seeder;

// composer require laracasts/testdummy
use Laracasts\TestDummy\Factory as TestDummy;

class SchoolTableSeeder extends Seeder
{
    public function run()
    {

        $legon = School::create([
            'name' => 'University of Legon Ghana',
            'phone' => '+233302213850',
            'address' => 'Legon Boundary, Accra',
            'city' => 'Accra',
            'region' => 'Greater Accra',
            'country' => 'Ghana',
            'postcode' => '',
            'lat' => '5.650562',
            'lng' => '-0.1962244',
            'school_category_id' => SchoolCategory::where('name', 'University')->first()->id,
        ]);

        $url = 'https://upload.wikimedia.org/wikipedia/commons/6/64/University_of_Ghana.png';
        $legon
            ->addMediaFromUrl($url)
            ->toMediaCollection('logo');

        $presec = School::create([
            'name' => 'Presbyterian Boys Secondary School',
            'phone' => '+233 (0) 32500945',
            'address' => 'Legon Boundary, Accra',
            'city' => 'Accra',
            'region' => 'Greater Accra',
            'country' => 'Ghana',
            'postcode' => '',
            'lat' => '5.66265',
            'lng' => '-0.1763339',
            'school_category_id' => SchoolCategory::where('name', 'Senior High School')->first()->id,
        ]);

        $url = 'https://upload.wikimedia.org/wikipedia/en/thumb/4/44/Presbyterian_boys_secondary_logo_2.png/220px-Presbyterian_boys_secondary_logo_2.png';
        $presec
            ->addMediaFromUrl($url)
            ->toMediaCollection('logo');
    }
}
