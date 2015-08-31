<?php

namespace Amitav\Todo\Models;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
	protected $table 	= 'todos';
	protected $guarded 	= array();
	public $timestamps 	= false;
}