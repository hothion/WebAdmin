<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product')->insert([
            "id" => 1,
            "name" => "Hoa cúc họa mi",
            "type" => 1,
            "img" => "https://i.ibb.co/0mPtM1k/bo-hoa-cuc-hoa-mi-2-removebg-preview.png",
            "price" => 120000,
            "discount" => 10,
            "heart" => 0,
            "quantity" => 100,
           
        ]);
    }
}
