<?php

namespace App\Model\Packages;

use App\Model\Licensors\Licensor;
use App\Model\Stores\Stores;
use Illuminate\Database\Eloquent\Model;

class PackagesCategory extends Model
{
    protected $table = 'packages_categories';

    protected $fillable = ['title', 'description', 'avatar', 'active', 'store_id', 'licensor_id'];

    public function store()
    {
        return $this->belongsTo(Stores::class, 'store_id', 'id');
    }
    public function licensor()
    {
        return $this->belongsTo(Licensor::class, 'licensor_id', 'id');
    }
}