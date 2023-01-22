<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentScore extends Model
{
    use HasFactory;

    protected $fillable = [
        'score_vii_1', 'score_vii_2',
        'score_viii_1', 'score_viii, 2',
        'score_ix_1', 'score_ix_2', 'total_score'
    ];
}
