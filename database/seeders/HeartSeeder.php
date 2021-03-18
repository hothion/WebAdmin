<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\DB;
class HeartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=0;$i<4; $i++){
            DB::table('hearts')->insert([
                'id_product'=>2,
                'id_user' =>2,
            ]);
        }
        for($i=0;$i<4; $i++){
            DB::table('hearts')->insert([
                'id_product'=>3,
                'id_user' =>1,
            ]);
        }
    }
}
