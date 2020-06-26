<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => "Emmanuel Oduro",
            'email' => "emmarthurson@gmail.com",
            'password' => '$2y$10$h7Irkx6r5nMvHH5GrAOsJudqDOUVsgXJnbNsg/Ep.wG47dm2CittS',
            'email_verified_at' => now()->toDateTimeString()
        ]);
    }
}
