<?php

namespace App\Model\FAQ;

use App\Model\Licensors\Licensor;
use App\Model\Stores\Stores;
use Illuminate\Database\Eloquent\Model;

class FaqCategory extends Model
{
    protected $table = 'faq_categories';

    protected $fillable = [
        'title', 'description', 'active', 'avatar', 'licensor_id', 'store_id',
    ];
    public function licensor()
    {
        return $this->belongsTo(Licensor::class, 'licensor_id', 'id');
    }
    public function store()
    {
        return $this->belongsTo(Stores::class, 'store_id', 'id');
    }
}