<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class student extends Model
{
    protected $table = 'students';
    protected $primary = 'id';
    protected $fillable = ['name','address','phone'];
}
