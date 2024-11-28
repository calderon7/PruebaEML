<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;
    public $timestamps = false;
    
    protected $fillable = [
        'email',
        'phone',
        'first_name',
        'second_name',
        'first_lastname',
        'second_lastname',
        'city',
        'created_user',
        'status',
        'state',
    ];
}
