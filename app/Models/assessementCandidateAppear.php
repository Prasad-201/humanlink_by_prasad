<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class assessementCandidateAppear extends Model
{
    use HasFactory;

    protected $fillable = [
        'assCandAppearID',
        'assessmentsIdFk',
        'talentIdFk',
        'totalMark',
        'attemptQuestion',
    ];

    
    protected $hidden = [
    ];

    protected $casts = [
    ];
}
