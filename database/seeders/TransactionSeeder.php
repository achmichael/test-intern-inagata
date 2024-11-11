<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Transaction;
use App\Models\User;

class TransactionSeeder extends Seeder
{
    
    public function run(): void
    {
        $user = User::first();

        Transaction::create([
            'user_id' => $user->id,
            'type' => 'income',
            'amount' => 10000,
            'description' => 'dikasih ayah'
        ]);

        Transaction::create([
            'user_id' => $user->id,
            'type' => 'expense',
            'amount' => 5000,
            'description' => 'diminta adek'
        ]);

        
    }
}
