<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'photo',
        'birth_place_date',
        'address',
        'nip',
        'email',
        'phone',
        'social_media',
        'subject',
        'position',
        'education_history',
        'employment_history',
        'motivation_message',
    ];
}
