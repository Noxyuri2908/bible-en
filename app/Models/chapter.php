<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class chapter extends Model
{
    protected $table='chapters';

    protected $fillable = [
        'name', 'slug', 'book_id', 'content', 'link', 'id', 'note'
    ];

    public function book()
	{
    	return $this->belongsTo('App\Models\book');
	}
}
