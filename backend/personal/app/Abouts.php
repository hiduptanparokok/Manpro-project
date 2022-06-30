<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Abouts extends Model
{
    protected $fillable = [
        'desc', 'birthday', 'website', 'phone',
        'city', 'age', 'degree', 'email', 'work', 'photo'
    ];
}
