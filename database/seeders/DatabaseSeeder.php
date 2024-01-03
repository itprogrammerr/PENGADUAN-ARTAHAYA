<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        DB::table('users')->insert([
            'uuid'      =>  Str::uuid(),
            'nik'       => '123456789',
            'name'       => 'Admin 1',
            'email'       => 'admin@gmail.com',
            'phone'       => '0821312121212',
            'password'       => Hash::make('123456789'),
        ]);
    }
}
