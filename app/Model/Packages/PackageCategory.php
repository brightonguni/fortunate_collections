<?php

namespace App\Model\Packages;

use App\Model\Packages\PackageCategory;
use App\Model\Packages\PackagesCategory;
use Illuminate\Database\Eloquent\Model;

class PackageCategory extends Model
{
    protected $table = 'package_categories';

    protected $fillable = ['package_id', 'category_id', 'id'];

    public function package()
    {
        return $this->belongsTo(Package::class, 'package_id', 'id');
    }

    public function category()
    {
        return $this->belongsTo(PackagesCategory::class, 'category_id', 'id');
    }
}