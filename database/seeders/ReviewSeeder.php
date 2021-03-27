<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\DB;
class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for($i=0;$i<4; $i++){
            DB::table('reviews')->insert([
                'id_user' =>2,
                'id_product'=>2,
                'content'=>"uefdsgfdg",
                'time'=>$faker->datetime
            ]);
        }
    }
}
