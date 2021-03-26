<?php

namespace App\Model\CaseStudies;

use App\Model\CaseStudies\CaseStudyCategory;
use App\Model\Employees\Department;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CaseStudy extends Model
{
    use softDeletes;

    protected $table = 'case_studies';

    protected $fillable = [
        'user_id',
        'avatar',
        'title',
        'description',
        'category_id',
        'active',
        'store_id',
        'licensor_id',
        'department_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function category()
    {
        return $this->belongsTo(CaseStudyCategory::class, 'category_id', 'id');
    }
    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id', 'id');
    }
}