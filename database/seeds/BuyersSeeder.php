<?php

use App\Buyer;
use Illuminate\Database\Seeder;

class BuyersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Buyer::class, 10)->create()->each(function($buyer){
            $buyer->save();
        });
    }
}
