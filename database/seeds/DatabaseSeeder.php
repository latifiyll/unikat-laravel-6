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
        $this->call(UserSeeder::class);
        $this->call(BuyersSeeder::class);
        $this->call(SuppliersSeeder::class);
        $this->call(CategoryTypeSeeder::class);
        $this->call(ProductsSeeder::class);
        $this->call(GeneralSettingsSeeder::class);


    }
}
