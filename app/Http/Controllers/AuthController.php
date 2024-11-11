<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function login(Request $request){

        $credentials = $request->only('email', 'password'); // Mengambil data email dan password dari request
       
        if (!Auth::attempt($credentials)){ // Mengecek krendensial login
            return response()->json([
                'status' => false,
                'data' => null,
                'message' => 'Login gagal, krendensial salah.'
            ], 401);
        }
        
        $user = Auth::user(); // Mengambil data user yang sedang login
        
        $token = $user->createToken('authToken')->plainTextToken; // Membuat token
        
        return response()->json([
            'status' => true,
            'data' => [
                'token' => $token
            ],
            'message' => 'Login berhasil.'
        ], 200);
    }
}
