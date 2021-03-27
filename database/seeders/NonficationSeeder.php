<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class NonficationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('nonfications')->insert([
        	[
                'id_user'=>1,
                'id_product'=>1,
                'type'=>5,
                'content'=>'Chào bạn, bạn cần hỗ trợ gì ạ?',
                'time'=>'2021-02-24 09:08:14'
        	]
        	
        ]);
    }
}
