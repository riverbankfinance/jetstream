<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Anthony Bird',
            'email' => 'abird@riverbankfinance.com',
            'role' => '1',
            'password' =>  Hash::make('Spring45#'),
        ]);

        User::create([
            'name' => 'Jen Bird',
            'email' => 'jen@riverbankfinance.com',
            'role' => '0',
            'password' => Hash::make('Spring45#'),
        ]);
    }
}
