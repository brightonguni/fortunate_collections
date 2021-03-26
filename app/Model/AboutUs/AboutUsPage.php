<?php

namespace App\Model\AboutUs;

use App\Model\Licensors\Licensor;
use App\Model\Stores\Stores;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AboutUsPage extends Model
{
    use softDeletes;

    protected $table = 'about_us_pages';

    protected $fillable = [
        'title',
        'description',
        'licensor_id',
        'store_id',
        'avatar',
        'active',
    ];

    public function store()
    {
        return $this->belongsTo(Stores::class, 'store_id', 'id');
    }
    public function licensor()
    {
        return $this->belongsTo(Licensor::class, 'licensor_id', 'id');
    }
}