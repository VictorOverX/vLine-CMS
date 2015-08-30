<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    protected $table 	= 'posts';
	protected $guarded 	= array();
	public $timestamps 	= false;
}
