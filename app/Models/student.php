<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Student extends Model
{
    //Authenticatable
    /** @use HasFactory<\Database\Factories\StudentFactory> */
    protected $fillable = ['name', 'email', 'password', 'image', 'phone', 'age', 'date_of_birth', 'address', 'gender'];
    use HasFactory;
    
}
