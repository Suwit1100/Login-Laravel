<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'Admin',
                'email' => 'admin@mail.com',
                'password' => Hash::make('111111'),
                'role' => 1
            ],
            [
                'name' => 'User',
                'email' => 'user@mail.com',
                'password' => Hash::make('111111'),
                'role' => 0
            ],
        ]);

        // คำสั่งรัน
        // php artisan db:seed --class=UsersTableSeeder
    }
}
