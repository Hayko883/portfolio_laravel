<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
		DB::table('users')->insert([
			'name' => 'SuperAdmin',
			'email' => 'superadmin@gmail.com',
			'password' => bcrypt('1111'),
			'role' => 1,
			'age' => 25,
			'address' => 'Admin',
			'profession' => 'Admin'
		]);
    }
}
