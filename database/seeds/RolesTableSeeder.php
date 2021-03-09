<?php

use App\Models\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
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
                'name' => 'admin',
                'guard_name' => 'web',
            ],
            [
                'name' => 'customer',
                'guard_name' => 'web',
            ],
            [
                'name' => 'driver',
                'guard_name' => 'web',
            ],

        ];

        foreach ($data as $d) {
            Role::create($d);
        }
    }
}
