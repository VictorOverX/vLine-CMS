<?php

namespace App\Http\Controllers\Layout;

use Illuminate\Http\Request;


use App\Http\Requests;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
   
    public function __construct()
    {
        
    }

    public function getHome()
    { 
        $dados = array(
            'posts' => \App\Models\Posts::getPostsStatus()
        );
        
        return view('themes.linexti.home', $dados);
    }
    
    public function getBlogSingle($slug)
    {
        
        $dados = array(
            'post' => \App\Models\Posts::getPostsStatus($slug) ,
            'tags'  => \App\Models\Tags::all()
        );
        
        return view('themes.linexti.blog-single', $dados);
    }

}
