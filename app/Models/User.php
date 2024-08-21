<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;
    public $timestamps = false;
    
    protected $fillable = [
        'user_name',
        'email',
        'num_document',
        'phone',
        'first_name',
        'second_name',
        'first_lastname',
        'second_lastname',
        'genere',
        'date_birth',
        'city',
        'created_user',
        'status',
    ];
}
