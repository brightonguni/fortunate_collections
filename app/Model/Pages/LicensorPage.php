<?php

namespace App\Model\Pages;

use Illuminate\Database\Eloquent\Model;

class LicensorPage extends Model
{
    protected $table = 'licensor_pages';

    protected $fillable = ['licensor_id', 'page_id'];

    public function licensor()
    {
        return $this->belongsTo(Licensor::class, 'licensor_id', 'id');
    }

    public function page()
    {
        return $this->belongsTo(Page::class, 'page_id', 'id');
    }
}