<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'first_name' => 'test1',
            'last_name' => 'test1',
            'username' => 'test1',
            'balance' => 1000,
            'password' => Hash::make(12345678),
        ]);
        User::create([
            'first_name' => 'test2',
            'last_name' => 'test2',
            'username' => 'test2',
            'balance' => 1000,
            'password' => Hash::make(12345678),
        ]);

    }
}


