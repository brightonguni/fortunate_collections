<?php

namespace App\Model\Employees;

use Illuminate\Database\Eloquent\Model;

class JobTitle extends Model
{
    protected $table = 'job_titles';

    protected $fillable = ['title','description','active'];
}