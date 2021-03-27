<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ChatSeeder::class);
        $this->call(NonficationSeeder::class);
        $this->call(UserSeeder::class);
       
    }
}
