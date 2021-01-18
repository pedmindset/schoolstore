<?php

use App\Models\SchoolCategory;
use Illuminate\Database\Seeder;

// composer require laracasts/testdummy
use Laracasts\TestDummy\Factory as TestDummy;

class SchoolCategoryTableSeeder extends Seeder
{
    public function run()
    {
       $categories = [
           [
                'name' => 'Senior High School',
           ],
           [
                'name' => 'Technical',
           ],
           [
                'name' => 'Vocational',
           ],
           [
                'name' => 'Polytechnic',
           ],
           [
                'name' => 'Professional Institution',
           ],
           [
                'name' => 'University',
           ],
       ];

       foreach ($categories as $c ) {
        SchoolCategory::create($c);
       }

    }
}
