<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class book extends Model
{
    protected $table='books';

    protected $fillable = [
        'name', 'slug', 'version_id', 'type', 'id', 'category'
    ];

    public function chapters()
	{
    	return $this->hasMany('App\Models\chapter');
	}

	public function version()
	{
    	return $this->belongsTo('App\Models\version');
	}
}
