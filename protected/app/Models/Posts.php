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
		return $posts = self::leftJoin('categorias', 'posts.post_categoria_id', '=', 'categorias.cat_id')
		->join('users', 'posts.post_autor','=','users.id')
		->get(); // Listando todos os posts
	}

	public static function getPostsStatus($slug = null)
	{ 
		if($slug == null){
			return $posts = self::where('post_status', 'sim')
			->join('users', 'posts.post_autor','=','users.id')
			->leftJoin('categorias', 'posts.post_categoria_id', '=', 'categorias.cat_id')->get(); // Listando todos os posts
		}else{
			return $posts = self::where('post_slug', $slug)
			->join('users', 'posts.post_autor','=','users.id')
			->where('post_status', 'sim')->leftJoin('categorias', 'posts.post_categoria_id', '=', 'categorias.cat_id')->first(); // Listando todos os posts
		}
	}

	public static function getPostCategoria()
	{
		return $posts = self::leftJoin('categorias', 'posts.post_categoria_id', '=', 'categorias.cat_id')->first(); // Listando todos os posts
	}
}
