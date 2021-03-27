<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
<<<<<<< HEAD
=======
use Faker\Generator as Faker;
>>>>>>> cf341b6cd82b09efde3f1e4236ce9b5b531d46b5
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
<<<<<<< HEAD
    public function run()
    {
        DB::table('users')->insert([
        	[
                'account'=>'onho',
                'firstName'=>'on',
                'lastName'=>'hoon',
                'email'=>'hothion@gmai.com',
                'phone'=>'7898686867',
                'gender'=>'Meow',
                'address'=>'101B Le Huu Trac',
                'password'=>Hash::make('123'),
                'birthday'=>'2021-02-24',
                'remember_token'=>1,
                'images'=>'./images/a2.jpg'
               
        	],
        	[
                'account'=>'yeuhothi',
                'firstName'=>'yeu',
                'lastName'=>'yeuho',
                'email'=>'hothiyeu@gmai.com',
                'phone'=>'7898686867',
                'gender'=>'Meow',
                'address'=>'101B Le Huu Trac',
                'password'=>Hash::make('1234'),
                'birthday'=>'2021-02-24',
                'remember_token'=>0,
                'images'=>'./images/a2.jpg'
               
        	],
            [
                'account'=>'chauho',
                'firstName'=>'chau',
                'lastName'=>'chauho',
                'email'=>'hothichau@gmai.com',
                'phone'=>'7898686867',
                'gender'=>'Meow',
                'address'=>'101B Le Huu Trac',
                'password'=>Hash::make('12345'),
                'birthday'=>'2021-02-24',
                'remember_token'=>0,
                'images'=>'./images/a2.jpg'
               
        	],
=======
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
>>>>>>> cf341b6cd82b09efde3f1e4236ce9b5b531d46b5
        ]);
    }
}
