<?php

namespace App\Model\Employees;

use App\Model\Employees\Employee;
use App\Model\Employees\EmployeeTeam;
use App\Model\Employees\Team;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EmployeeTeam extends Model
{
  use SoftDeletes;
 
  protected $table = 'employee_teams';

    protected $fillable = ['employee_id', 'team_id', 'id'];

    // public function employees()
    // {
    //     return $this->belongsToMany(Employee::class, 'employee_teams','employee_id', 'team_id');
    // }
    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id', 'id');
    }
    public function team()
    {
        return $this->belongsTo(Team::class, 'team_id', 'id');
    }
    public function teams()
    {
        return $this->hasMany(Employee::class, 'employee_teams','team_id', 'employee_id');
    }
}