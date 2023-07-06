<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('admin_users')->insert([
            'name' => 'owner',
            'username' => 'owner',
            'password' => \Hash::make('password'),
        ]);
        DB::table('admin_users')->insert([
            'name' => 'sub',
            'username' => 'sub_owner',
            'password' => \Hash::make('password'),
        ]);
    }
}
