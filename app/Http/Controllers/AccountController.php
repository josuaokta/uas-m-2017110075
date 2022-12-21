<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AccountController extends Controller
{
    public function index() {
        try {
            $accounts = Account::orderBy("created_at","desc")->paginate(10);
            return view("accounts.index", compact("accounts"));
        } catch (\Throwable $th) {
            return redirect()->back()->with(['error' => $th->getMessage()]);
        }
    }

    public function create() {
        return view("accounts.create");
    }

    public function store(Request $request) {
        try {
            $validator = Validator::make($request->all(), [
                'id' => 'required',
                'nama' => 'required',
                'jenis' => 'required',
            ]);
            if ($validator->fails()) {
                return redirect()->back()
                            ->with(['error' => $validator->errors()->first()])
                            ->withInput();
            }

            $dataAccount = new Account();
            $dataAccount->id = $request->id;
            $dataAccount->nama = $request->nama;
            $dataAccount->jenis = $request->jenis;
            $dataAccount->save();

            return redirect()->back()->with(['message' => 'Data berhasil tersimpan.']);
        } catch (\Throwable $th) {
            return redirect()->back()->with(['error' => $th->getMessage()]);
        }
    }

    public function edit($id) {
        try {
            $dataAccount = Account::where("id", $id)->first();
            if (!$dataAccount) {
                abort(400);
            } 

            return view("accounts.edit", compact("dataAccount"));
        } catch (\Throwable $th) {
            return redirect()->back()->with(['error' => $th->getMessage()]);
        }
    }

    public function update(Request $request) {
        try {
            $validator = Validator::make($request->all(), [
                'nama' => 'required',
                'jenis' => 'required',
            ]);
            if ($validator->fails()) {
                return redirect()->back()
                            ->with(['error' => $validator->errors()->first()])
                            ->withInput();
            }

            $dataAccount = Account::where("id", $request->id)->first();
            if (!$dataAccount) {
                abort(400);
            }

            $dataAccount->nama = $request->nama;
            $dataAccount->jenis = $request->jenis;
            $dataAccount->save();

            return redirect()->back()->with(['message' => 'Data berhasil terubah.']);
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

            $dataAccount = Account::where("id", $request->id)->first();
            if (!$dataAccount) {
                abort(400);
            }

            $dataAccount->delete();

            return redirect()->back()->with(['message' => 'Data berhasil terhapus.']);
        } catch (\Throwable $th) {
            return redirect()->back()->with(['error' => $th->getMessage()]);
        }
    }
}
