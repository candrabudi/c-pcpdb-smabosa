<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentFather extends Model
{
    use HasFactory;

    protected $fillable = [
        'father_name', 'birth_date', 'birth_place', 'education',
        'religion', 'profession', 'income', 'whatsapp_phone_number',
        'user_id'
    ];
}
