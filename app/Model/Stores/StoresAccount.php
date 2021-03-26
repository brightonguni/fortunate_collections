<?php

namespace App\Model\Stores;

use App\Model\Stores\Account;
use App\Model\Stores\Stores;
use App\Model\Stores\StoresAccount;
use Illuminate\Database\Eloquent\Model;

class StoresAccount extends Model
{
    protected $table = 'stores_accounts';

    protected $fillable = ['store_id', 'account_id'];

    public function store()
    {
        return $this->belongsTo(Stores::class, 'store_id', 'id');
    }
    public function account()
    {
        return $this->belongsTo(Account::class, 'account_id', 'id');
    }
}