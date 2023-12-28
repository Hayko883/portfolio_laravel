<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name'=>'John Smith',
                'email'=>'john@gmail.com',
                'password'=>'1234',
                'age'=>22,
                'residence'=>'BD',
                'freelance'=>'available',
                'address'=>'Zeytun',
                'profession'=>'developer'
            ],
            [
                'name'=>'John Snow',
                'email'=>'snow@gmail.com',
                'password'=>'123456',
                'age'=>32,
                'residence'=>'BB',
                'freelance'=>'available',
                'address'=>'Noth',
                'profession'=>'king'
            ],
            [
                'name'=>'Michael Owen',
                'email'=>'owen@gmail.com',
                'password'=>'12345',
                'age'=>24,
                'residence'=>'DD',
                'freelance'=>'available',
                'address'=>'England',
                'profession'=>'football player'
            ]
        ]);
    }
}
