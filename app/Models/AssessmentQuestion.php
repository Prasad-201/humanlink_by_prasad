<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssessmentQuestion extends Model
{
    use HasFactory;

    protected $fillable = [
        'assessments_idfk',
        'assessment_question',
        'assessment_option_1',
        'assessment_option_2',
        'assessment_option_3',
        'assessment_option_4',
        'assessment_answer',
    ];

    protected $hidden = [
    ];

    protected $casts = [
    ];
}
