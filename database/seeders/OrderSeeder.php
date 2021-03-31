<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\DB;
class OrderSeeder extends Seeder
{
    public function run()
    {
        for($i=0;$i<4; $i++){
            DB::table('orders')->insert([
                'id_product'=>2,
                'id_user' =>2,
                'id_orderStatus'=>1,
                'quantity' =>333
            ]);
        }
        for($i=0;$i<4; $i++){
            DB::table('orders')->insert([
                'id_product'=>4,
                'id_user' =>1,
                'id_orderStatus'=>3,
                'quantity' =>333
            ]);
        }
    }
}
