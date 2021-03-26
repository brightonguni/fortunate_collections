<?php

use App\Model\Stores\Stores;
use Illuminate\Database\Seeder;

class StoreTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $stores = [
            array(
                "id" => 1,
                "name" => "Fortunate Collections, Cape Town",
                "phone" => "0794623106",
                "email" => "info@fortunatecollections.co.za",
                "website" => "http://www.fortunatecollections.co.za/",
                "pin" => "1234",
                "avatar" => "jeans.jpeg",
                "active" => 1,
                'description' => "the best place to be when you want to change your wardrope.",
                "created_at" => "2017-03-22 05:36:35",
                "updated_at" => "2018-11-06 10:34:16",

            ),

        ];
        foreach ($stores as $store) {
            Stores::create($store);
        }
    }
}