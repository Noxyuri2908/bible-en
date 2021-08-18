<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class plan extends Model
{
    protected $table='plans';

    protected $fillable = [
        'name', 'slug', 'description', 'link', 'id'
    ];
}
