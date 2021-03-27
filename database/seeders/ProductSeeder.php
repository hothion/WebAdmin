<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\DB;
class ProductSeeder extends Seeder
{

    public function run(Faker $faker)
    {
        for($i=0;$i<18; $i++){
            DB::table('product')->insert([
                'name'=>$faker->name,
                'type' => 3,
                'img' => "sfsdf",
                'desciption'=>"dgfdgfhfgh",
                "price"=>242343,
                "discount"=>34,
                'heart'=>0,
                'quantity' =>45,
            ]);
        }

    }
}
