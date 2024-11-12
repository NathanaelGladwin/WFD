<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('users')->insert([
            [
                'name'=>'User 1',
                'email'=>'user@user.com',
                'password'=>Hash::make('user'),
                'created_at'=>now(),
            ],
            [
                'name'=>'User 2',
                'email'=>'user2@user.com',
                'password'=>Hash::make('user'),
                'created_at'=>now(),
            ],
        ]);
    }
}
