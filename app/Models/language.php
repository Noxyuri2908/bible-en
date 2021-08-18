<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class language extends Model
{
    protected $table='languages';

    protected $fillable = [
        'name', 'slug', 'id'
    ];
}
