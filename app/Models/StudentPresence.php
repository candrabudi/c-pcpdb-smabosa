<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentPresence extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 's_vii_1', 'i_vii_1', 'tk_vii_1',
        's_vii_2', 'i_vii_2', 'tk_vii_2',
        's_viii_1', 'i_viii_i', 'tk_viii_1',
        's_viii_2', 'i_viii_2', 'tk_viii_2',
        's_ix_1', 'i_ix_1', 'tk_ix_1',
        's_ix_2', 'i_ix_2', 'tk_ix_2',
        'total_sick', 'total_permission', 'total_alpha'
    ];
}
