<?php

namespace App\Model\Teams;

use Illuminate\Database\Eloquent\Model;

class TeamEmployee extends Model
{
    protected $table = "team_employees";

    protected $fillable = ['employee_id', 'team_id','id'];
}