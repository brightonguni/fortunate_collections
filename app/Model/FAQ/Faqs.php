<?php

namespace App\Model\FAQ;

use App\Model\FAQ\FaqCategory;
use App\Model\Licensors\Licensor;
use App\Model\Stores\Stores;
use Illuminate\Database\Eloquent\Model;

class Faqs extends Model
{
    protected $table = 'faqs';

    protected $fillable = [
        'question', 'answer', 'active', 'category_id', 'licensor_id', 'store_id',
    ];

    public function store()
    {
        return $this->belongsTo(Stores::class, 'store_id', 'id');
    }
    public function licensor()
    {
        return $this->belongsTo(Licensor::class, 'licensor_id', 'id');
    }
    public function category()
    {
        return $this->belongsTo(FaqCategory::class, 'category_id', 'id');
    }
}