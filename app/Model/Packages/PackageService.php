<?php

namespace App\Model\Packages;

use App\Model\Packages\Package;
use App\Model\Services\Service;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PackageService extends Model
{
    use SoftDeletes;

    protected $table = 'package_services';

    protected $fillable = ['package_id', 'service_id', 'id'];

    public function package()
    {
        return $this->belongsTo(Package::class, 'package_id');
    }

    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id');
    }
}