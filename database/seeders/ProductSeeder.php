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
                'img' => "https://bizweb.dktcdn.net/100/347/446/files/1-79ef06be-ce3a-4f69-8adf-f96c23091fd7.jpg?v=1578545540216",
                'desciption'=>$faker->paragraph($nbSentences = 4, $variableNbSentences = true),
                "price"=>$faker->numberBetween($min = 100000, $max = 1000000),
                "discount"=>$faker->randomDigitNot(100),
                'heart'=>0,
                'quantity' =>$faker->randomDigitNot(300),
                'created_at'=>$faker->date($format = 'Y-m-d', $max = 'now')
            ]);
        }

    }
}
