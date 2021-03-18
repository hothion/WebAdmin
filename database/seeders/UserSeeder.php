<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        DB::table('users')->insert([
        	'account'=>"yeu",
            'firstName' => "yeu",
            'lastName' => "ho",
            'email'=>$faker->unique->email,
            "phone"=>$faker->phoneNumber,
            "gender"=>"Nu",
            'address'=>$faker->city,
            'password' =>Hash::make('yeuho'),
            'birthday' =>$faker->date,
            'remember_token'=>0
        ]);
        DB::table('users')->insert([
        	'account'=>"on",
            'firstName' => "on",
            'lastName' => "ho",
            'email'=>$faker->unique->email,
            "phone"=>$faker->phoneNumber,
            "gender"=>"Nu",
            'address'=>$faker->city,
            'password' =>Hash::make('onho'),
            'birthday' =>$faker->date,
            'remember_token'=>0
        ]);
        DB::table('users')->insert([
        	'account'=>"anh",
            'firstName' => "Anh",
            'lastName' => "nguyen",
            'email'=>$faker->unique->email,
            "phone"=>$faker->phoneNumber,
            "gender"=>"Nam",
            'address'=>$faker->city,
            'password' =>Hash::make('anhnguyen'),
            'birthday' =>$faker->date,
            'remember_token'=>1
        ]);
        DB::table('users')->insert([
        	'account'=>"loan",
            'firstName' => "Loan",
            'lastName' => "ARat",
            'email'=>$faker->unique->email,
            "phone"=>$faker->phoneNumber,
            "gender"=>"Nu",
            'address'=>$faker->city,
            'password' =>Hash::make('loan'),
            'birthday' =>$faker->date,
            'remember_token'=>0
        ]);
        DB::table('users')->insert([
        	'account'=>"mai",
            'firstName' => "mai",
            'lastName' => "ho",
            'email'=>$faker->unique->email,
            "phone"=>$faker->phoneNumber,
            "gender"=>"Nu",
            'address'=>$faker->city,
            'password' =>Hash::make('maiho'),
            'birthday' =>$faker->date,
            'remember_token'=>0
        ]);
    }
}
