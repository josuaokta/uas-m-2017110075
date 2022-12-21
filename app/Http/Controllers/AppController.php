<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Transaction;
use Illuminate\Http\Request;

class AppController extends Controller
{
    public function index() {
        try {
            $counterAccount = Account::count();
            $counterTransaction = Transaction::count();
            return view("index", compact("counterAccount", "counterTransaction"));
        } catch (\Throwable $th) {
            return redirect()->back()->with(['error' => $th->getMessage()]);
        }
    }
}
