<?php

namespace App\Http\Controllers\backend;

use App\Models\Transaction;
use App\Http\Controllers\Controller;

class TransactionController extends Controller
{

    public function getAdminTransactions()
    {
        $transactions = Transaction::all();
        return view('backend.transactions.admin_transactions', ['transactions' => $transactions]);
    }
}
