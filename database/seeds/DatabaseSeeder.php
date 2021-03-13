<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CountriesTableSeeder::class);
        $this->call(ProductCategoryTableSeeder::class);
        $this->call(ProductTableSeeder::class);
        $this->call(SchoolCategoryTableSeeder::class);
        $this->call(SchoolTableSeeder::class);
        $this->call(HostelTableSeeder::class);
        $this->call(RolesTableSeeder::class);

        $this->call(UserTableSeeder::class);
        $this->call(ProfilesTableSeeder::class);


        $this->call(OrdersTableSeeder::class);
        $this->call(DeliverySchedulesTableSeeder::class);
    }
}
