<?php

namespace App\Model\CaseStudies;

use Illuminate\Database\Eloquent\Model;
use App\Model\CaseStudies\CaseStudy;

class CaseStudyCategory extends Model
{

    protected $table = 'case_study_categories';

    protected $fillable = [
        'title',
        'description',
        'avatar',
        'active',
        'store_id',
        'licensor_id',
    ];
    public function CaseStudy()
    {
      return $this->hasMany(CaseStudy::class,'case_study_id');
    }
}