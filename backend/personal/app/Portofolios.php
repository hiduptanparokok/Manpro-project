<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Portofolios extends Model
{
    protected $fillable = [
        'title', 'desc', 'photo',
      ];
}
