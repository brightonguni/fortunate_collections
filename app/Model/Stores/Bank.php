<?php
namespace App\Model\Stores;

use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{

    /**Category
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'banks';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'branch_code','id','active'
    ];

}