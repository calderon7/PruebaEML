<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'user_name',
        'email',
        'number_document',
        'first_name',
        'second_name',
        'first_lastname',
        'second_lastname',
        'genere',
        'date_birth',
        'city',
        'update_user',
    ];
}
