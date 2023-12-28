<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserLanguagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       DB::table('user_languages')->insert([
           [
               'user_id'=>3,
               'language_id'=>1,
               'percent'=>80,
               'created_at'=>Carbon::now(),
               'updated_at'=>Carbon::now(),
           ],
           [
               'user_id'=>1,
               'language_id'=>2,
               'percent'=>45,
               'created_at'=>Carbon::now(),
               'updated_at'=>Carbon::now(),

           ],
           [
               'user_id'=>1,
               'language_id'=>1,
               'percent'=>45,
               'created_at'=>Carbon::now(),
               'updated_at'=>Carbon::now(),

           ],
           [
               'user_id'=>1,
               'language_id'=>4,
               'percent'=>45,
               'created_at'=>Carbon::now(),
               'updated_at'=>Carbon::now(),

           ],
           [
               'user_id'=>2,
               'language_id'=>4,
               'percent'=>98,
               'created_at'=>Carbon::now(),
               'updated_at'=>Carbon::now(),
           ]
       ]);
    }
}
