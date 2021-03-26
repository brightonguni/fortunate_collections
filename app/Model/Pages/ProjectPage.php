<?php

namespace App\Model\Pages;

use Illuminate\Database\Eloquent\Model;

class ProjectPage extends Model
{
    protected $table = 'project_pages';

    protected $fillable = [
        'title',
        'description',
        'active',
    ];
}