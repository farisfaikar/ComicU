<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Comic;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */


    public function index()
    {
        $transactions = Transaction::paginate(10);
        return view('transaction.index-transaction', compact('transactions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('transaction.create-transaction', [
            'users' => User::all(),
            'comics' => Comic::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required',
            'comic_id' => 'required',
        ]);

        // Buat objek Transaction dan set propertinya
        $transaction = new Transaction();
        $transaction->user_id = $validatedData['user_id'];
        $transaction->comic_id = $validatedData['comic_id'];

        // Simpan transaksi
        $transaction->save();

        // Redirect ke halaman index-transaction dengan pesan sukses
        return redirect()->route('transaction.index')->with('success', 'Transaction created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaction $transaction)
    {
        $comics = Comic::all(); // Gantilah ini dengan cara Anda mendapatkan daftar Comic
        return view('transaction.edit-transaction', compact('transaction', 'comics'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transaction $transaction)
    {
        $validatedData = $request->validate([
            'user_id' => 'required',
            'comic_id' => 'required',

        ]);

        $transaction->update([
            'user_id' => $validatedData['user_id'],
            'comic_id' => $validatedData['comic_id'],

        ]);

        return redirect()->route('transaction.index')->with('success', 'Transaction updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaction $transaction)
    {
        $transaction->delete();

        return redirect()
            ->route('transaction.index')
            ->with('success', 'Transaction deleted successfully.');
    }

    public function search(Request $request, Transaction $transaction)
{
    $query = Transaction::query();

    if ($request->has('search')) {
        $searchTerm = $request->search;

        $query->where(function ($query) use ($searchTerm) {
            $query->where('user_id', 'LIKE', '%' . $searchTerm . '%')
                ->orWhereHas('user', function ($subQuery) use ($searchTerm) {
                    $subQuery->where('name', 'LIKE', '%' . $searchTerm . '%');
                });
        });
    }

    $transactions = $query->paginate(10);

    return view('transaction.index-transaction', ['transactions' => $transactions]);
}


}
