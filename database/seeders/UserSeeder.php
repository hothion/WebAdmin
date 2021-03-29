<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
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
        ]);
    }
}
