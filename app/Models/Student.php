<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'nisn', 'phone_number', 'whatsapp_phone_number', 'house_phone_number',
        'gender', 'place_birh', 'date_birth', 'religion', 'address', 'address'
    ];
}
