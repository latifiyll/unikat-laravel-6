<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GeneralSettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('general_settings')->insert(array(
            array(
                'id'=> 2,
                'company_name'=> 'Your Company Name',
                'company_email'=> 'yourcomapany@gmail.com',
                'company_address'=> 'Address: Company address',
                'company_phone'=> '+381 12345678',
                'company_city'=> 'Comapny City',
                'company_country'=> 'Company Country',
                'social_links'=> json_encode(["key" => "value"]),
                'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'=>Carbon::now()->format('Y-m-d H:i:s')),
        ));
    }
}
