<?php

namespace App\Model\Stores;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StoreBank extends Model
{
  use SoftDeletes;
  
    protected $table = 'store_banks';

    // /**
    //  * The attributes that are mass assignable.
    //  *
    //  * @var array
    //  */
     protected $fillable = [
         'bank_id', 'store_id',
     ];
     public function bank()
    {
        return $this->belongsTo(Bank::class, 'bank_id', 'id');
    }
    public function store()
    {
        return $this->belongsTo(Stores::class, 'store_id', 'id');
    }
}