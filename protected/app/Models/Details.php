<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Details extends Model
{
    /**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table 	= 'details';
	protected $guarded 	= array();
	public $timestamps 	= false;
}
