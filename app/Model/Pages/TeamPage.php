<?php

namespace App\Model\Pages;

use Illuminate\Database\Eloquent\Model;

class TeamPage extends Model
{
    protected $table = 'team_pages';

    protected $fillable = [
        'title',
        'description',
        'active',
    ];
}