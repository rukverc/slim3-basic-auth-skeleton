<?php

namespace Base\Models;

use Illuminate\Database\Eloquent\Model;

class Press extends Model {

	protected $table = 'press';
	
	protected $fillable = [
		'slug',
		'title',
		'description',
		'published_on'
    ];
	
}
