<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;

use Illuminate\Http\Request;

class TransactionsController extends Controller
{
    public function showAllTransactions()
    {
        $transactions = Transaction::orderBy('updated_at')->get();
        return view('transactions', ['transactions' => $transactions]);
    }

    public function createTransaction()
    {
        return view('create-transaction');
    }

    public function storeTransaction(Request $request)
    {

        $validated = $request->validate([
            'transaction_title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'status' => 'required|string|max:10',
            'total_amount' => 'required|numeric',
            'transaction_number' => 'required|numeric|unique:transactions,transaction_number',
        ]);



        $transactions = Transaction::create([
            'transaction_title' => $validated['transaction_title'],
            'description' => $validated['description'],
            'status' => $validated['status'],
            'total_amount' => $validated['total_amount'],
            'transaction_number' => $validated['transactions_number'],

        ]);


        if (!$transactions) {
            return redirect()->back()->with('error', 'Failed to save transaction.');
        }


        return redirect()->route('showAllTransactions')->with('success', 'Transaction Saved.');
    }


    public function viewTransaction(Request $request)
    {
        $transaction = Transaction::find($request->id);
        return view('transaction', ['transaction' => $transaction]);
    }

    public function editTransaction(Request $request)
    {
        $transaction = Transaction::find($request->id);
        return view('edit-transaction', ['transaction' => $transaction]);
    }

    public function updateTransaction(Request $request, int $id)
    {

        $validated = $request->validate([
            'transaction_title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'status' => 'required|string|max:10',
            'total_amount' => 'required|numeric',
            'transaction_number' => 'required|numeric|unique:transactions,transaction_number,' . $id,
        ]);


        $transaction = Transaction::findOrFail($id);
        $transaction->update($validated);


        return redirect()->route('viewTransaction', ['id' => $transaction->id])->with('success', 'Transaction Updated Successfully.');
    }

    public function deleteTransaction(Request $request)
    {
        $transaction = Transaction::findOrFail($request->id);
        if ($transaction) {
            $transaction->delete();
        }
        return redirect()->route('showAllTransactions')->with('success', 'Transaction Deleted Successfully');
    }
}
