<?php

namespace App\Model\Pages;

use Illuminate\Database\Eloquent\Model;

class CaseStudyPage extends Model
{
    protected $table = 'case_study_pages';

    protected $fillable = [
      'title',
      'description',
      'active',
      'banner_image'
    ];
}