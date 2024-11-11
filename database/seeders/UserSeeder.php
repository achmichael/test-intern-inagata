<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
   
    public function run(): void
    {
        User::create([
            'email' => 'coba@gmail.com',
            'password' => Hash::make('coba#123')
        ]);

        User::create([
            'email' => 'coba2@gmail.com',
            'password' => Hash::make('coba2#123')
        ]);        
    }
}
