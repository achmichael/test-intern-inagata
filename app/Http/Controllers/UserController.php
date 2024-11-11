<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function listUserWithTransaction()
    {
        $users = User::with(['transactions'])->get();

        $data = $users->map(function ($user){
            return [
                'user' => $user,
                'income' => $user->transactions->where('type', 'income')->sum('amount'),
                'expense' => $user->transactions->where('type', 'expense')->sum('amount'),
            ];
        });

        return response()->json([
            'status' => true,
            'data' => $data,
            'message' => 'Data user dengan transaksinya berhasil diambil'
        ], 200);
    }
}
