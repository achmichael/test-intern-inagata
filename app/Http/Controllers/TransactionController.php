<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
     public function addTransaction(Request $request)
     {

        $request->validate([
            'type' => 'required|string|in:income,expense',
            'amount' => 'required|numeric',
            'description' => 'nullable|string'
        ]);
       
        $transaction = Transaction::create([
            'user_id' => Auth::id(),
            'type' => $request->type,
            'amount' => $request->amount,
            'description' => $request->description
        ]);
        
      return response()->json([
            'status' => true,
            'data' => $transaction->id,
            'message' => 'Berhasil menambahkan transaksi'
        ], 201);
     }

     public function updateTransaction(Request $request, $id)
     {
        $request->validate([
            'type' => 'required|string|in:income,expense',
            'amount' => 'required|numeric',
            'description' => 'nullable|string'
        ]);

        $transaction = Transaction::findOrFail($id);

        if (!$transaction || $transaction->user_id != Auth::id())
        {
            return response()->json([
                'status' => false,
                'data' => null,
                'message' => 'Transaksi tidak ditemukan, tolong berikan id yang sesuai'
            ], 404);
        }
     
        $transaction->update([$request->only(['type', 'amount', 'description'])]);

        return response()->json([
            'status' => true,
            'data' => $transaction->id,
            'message' => 'Transaksi berhasil di update'
        ], 200);
     }
}
