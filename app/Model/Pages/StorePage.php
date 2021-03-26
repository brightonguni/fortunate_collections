<?php

namespace App\Model\Pages;

use Illuminate\Database\Eloquent\Model;
use App\Model\Stores\Stores;
use App\Model\Pages\Page;

class StorePage extends Model
{
    protected $table = 'store_pages';

    protected $fillable = ['store_id','page_id'];

    public function store()
    {
      return $this->belongsTo(Store::class, 'store_id','id');
    }

    public function page()
    {
      return $this->belongsTo(Page::class,'page_id','id');
    }
}