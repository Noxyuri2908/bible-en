<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class version extends Model
{
    protected $table='versions';

    protected $fillable = [
        'name', 'slug', 'publisher', 'infomation', 'language_id', 'link', 'id'
    ];

    public function books()
	{
    	return $this->hasMany('App\Models\book');
	}
}
