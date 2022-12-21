<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $appends =['account'];
    public function getAccountAttribute() {
        return Account::where("id", $this->attributes['account_id'])->first();
    }
}
