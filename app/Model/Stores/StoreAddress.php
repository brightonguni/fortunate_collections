<?php

namespace App\Model\Stores;

use Illuminate\Database\Eloquent\Model;
use App\Model\Stores\StoresAddress;
use App\Model\Stores\Stores;

class StoreAddress extends Model
{
    protected $table = 'store_address';

    protected $fillable = ['store_id','address_id','id'];

    public function address()
    {
      return $this->belongsTo(StoresAddress::class, 'address_id','id');
    }
    public function store()
    {
      return $this->belongsTo(Stores::class, 'store_id','id');
    }
}