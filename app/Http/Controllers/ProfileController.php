<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function getProfile()
    {
       
        $user = Auth::user(); // Mengambil data user yang sedang login
        return response()->json([
            'status' => true,
            'data' => $user,
            'message' => 'Data profile tersedia'
        ]);
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();
        $user->update($request->only('email', 'password'));

        return response()->json([
            'status' => true,
            'data' => $user,
            'message' => 'Data profile berhasil diupdate'
        ]);
    }
}
