<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TransactionController extends Controller
{
    public function index() {
        try {
            $transactions = Transaction::orderBy("created_at","desc")->paginate(10);
            return view("transactions.index", compact("transactions"));
        } catch (\Throwable $th) {
            return redirect()->back()->with(['error' => $th->getMessage()]);
        }
    }

    public function create() {
        try {
            $accounts = Account::orderBy("created_at","desc")->get();
            return view("transactions.create", compact("accounts"));
        } catch (\Throwable $th) {
            return redirect()->back()->with(['error' => $th->getMessage()]);
        }
    }

    public function store(Request $request) {
        try {
            $validator = Validator::make($request->all(), [
                'kategori' => 'required',
                'nominal' => 'required',
                'tujuan' => 'required',
                'account_id' => 'required',
            ]);
            if ($validator->fails()) {
                return redirect()->back()
                            ->with(['error' => $validator->errors()->first()])
                            ->withInput();
            }

            $dataTransaction = new Transaction();
            $dataTransaction->kategori = $request->kategori;
            $dataTransaction->nominal = $request->nominal;
            $dataTransaction->tujuan = $request->tujuan;
            $dataTransaction->account_id = $request->account_id;
            $dataTransaction->save();

            return redirect()->back()->with(['message' => 'Data berhasil tersimpan.']);
        } catch (\Throwable $th) {
            return redirect()->back()->with(['error' => $th->getMessage()]);
        }
    }

    public function delete(Request $request) {
        try {
            $validator = Validator::make($request->all(), [
                'id'    => 'required'
            ]);
            if ($validator->fails()) {
                return redirect()->back()
                            ->with(['error' => $validator->errors()->first()])
                            ->withInput();
            }

            $dataTransaction = Transaction::where("id", $request->id)->first();
            if (!$dataTransaction) {
                abort(400);
            }

            $dataTransaction->delete();

            return redirect()->back()->with(['message' => 'Data berhasil terhapus.']);
        } catch (\Throwable $th) {
            return redirect()->back()->with(['error' => $th->getMessage()]);
        }
    }
}
