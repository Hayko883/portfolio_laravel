<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SkillsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('skills')->insert([
            [
                'name' => 'Html'
            ],
            [
                'name' => 'CSS'
            ],
            [
                'name' => 'JS'
            ],
            [
                'name' => 'PHP'
            ],
            [
                'name' => 'WordPress'
            ]
        ]);
    }
}
