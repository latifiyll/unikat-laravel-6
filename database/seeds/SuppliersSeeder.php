<?php

use App\Supplier;
use Illuminate\Database\Seeder;

class SuppliersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Supplier::class, 10)->create()->each(function($supplier){
            $supplier->save();
        });
    }
}
