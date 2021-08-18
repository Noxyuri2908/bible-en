<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class planRef extends Model
{
    protected $table='plan_refs';

    protected $fillable = [
        'plan_id', 'content', 'link', 'day', 'month', 'version_id', 'id', 'name'
    ];

    public function plan()
	{
    	return $this->belongsTo('App\Models\plan');
	}

	public function version()
	{
    	return $this->belongsTo('App\Models\version');
	}
}
