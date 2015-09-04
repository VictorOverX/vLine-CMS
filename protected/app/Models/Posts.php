<?php

namespace App\Models;
use App\Models\categorias;
use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    protected $table 	= 'posts';
	protected $guarded 	= array();
	public $timestamps 	= false;

	public static function getPostsCategorias()
	{
		return $posts = self::leftJoin('categorias', 'posts.post_categoria_id', '=', 'categorias.cat_id')->get(); // Listando todos os posts
	}
}
