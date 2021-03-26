<?php

namespace App\Model\Licensors;

use App\Model\Licensors\Licensor;
use Illuminate\Database\Eloquent\Model;

class LicensorStore extends Model
{
    /**Category
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'licensor_stores';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'licensor_id', 'store_id',
    ];

    public function licensor()
    {
        return $this->belongsTo(Licensor::class, 'licensor_id', 'id');
    }

}
