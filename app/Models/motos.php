<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class motos extends Model
{
    protected $fillable = [
        'modelo',
        'marca',
        'ano',
    ];
}
