<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class BlogController extends Controller
{
    /**
     * POSTS
     *
     * @return Response
     */
    public function index()
    {
        
        $style  = '
        <link rel="stylesheet" href="'. \URL::to('vendor/datatables-colvis/css/dataTables.colVis.css') .'">
        <link rel="stylesheet" href="'. \URL::to('app/vendor/datatable-bootstrap/css/dataTables.bootstrap.css') .'">
        ';

        $script = '  
        <script src="'. \URL::to('vendor/bootstrap-filestyle/src/bootstrap-filestyle.js').'"></script> 
        <script src="'. \URL::to('vendor/chosen_v1.2.0/chosen.jquery.min.js').'"></script>
         
        <script src="'. \URL::to('vendor/datatables/media/js/jquery.dataTables.min.js') .'"></script>
        <script src="'. \URL::to('vendor/datatables-colvis/js/dataTables.colVis.js') .'"></script>
        <script src="'. \URL::to('app/vendor/datatable-bootstrap/js/dataTables.bootstrap.js') .'"></script>
        <script src="'. \URL::to('app/vendor/datatable-bootstrap/js/dataTables.bootstrapPagination.js') .'"></script>
        <script src="'. \URL::to('app/js/demo/demo-datatable.js') .'"></script>    
        <script src="'. \URL::to('app/js/ajax/posts.js') .'"></script>       
        ';

        $posts      = \App\Models\Posts::join('categorias', 'posts.post_categoria_id', '=', 'categorias.cat_id')->get(); 
        
        $dados      = array(
            'posts'     => $posts,
            'style'     => $style,
            'script'    => $script
        );        
        return view('admin.blog.index', $dados);
    }

    public function novoPost()
    {
        $style  = '
        <!-- TAGS INPUT-->
        <link rel="stylesheet" href="'. \URL::to('vendor/bootstrap-tagsinput/dist/bootstrap-tagsinput.css').'">
        <!-- CHOSEN-->
        <link rel="stylesheet" href="'. \URL::to('vendor/chosen_v1.2.0/chosen.min.css').'">
        ';

        $script = '  
        <script src="'. \URL::to('vendor/bootstrap-filestyle/src/bootstrap-filestyle.js').'"></script> 
        <script src="'. \URL::to('vendor/chosen_v1.2.0/chosen.jquery.min.js').'"></script>  
        <!-- TAGS INPUT-->
        <script src="'. \URL::to('vendor/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') .'"></script>

        <!-- CHOSEN-->
        <script src="'. \URL::to('vendor/chosen_v1.2.0/chosen.jquery.min.js') .'"></script>
        <script src="'. \URL::to('app/vendor/ckeditor/ckeditor.js') .'"></script>
        <script>
            CKEDITOR.replace( "j_post", {
                uiColor: "#E1E1E1",
                skin: "office2013",
                
                    filebrowserBrowseUrl      : "'. \URL::to('app/vendor/ckeditor/kcfinder/browse.php?type=files') .'",
                    filebrowserImageBrowseUrl : "'. \URL::to('app/vendor/ckeditor/kcfinder/browse.php?type=images') .'",
                    filebrowserVideoBrowseUrl : "'. \URL::to('app/vendor/ckeditor/kcfinder/browse.php?type=videos') .'",
                    filebrowserFlashBrowseUrl : "'. \URL::to('app/vendor/ckeditor/kcfinder/browse.php?type=flash') .'",
                    filebrowserUploadUrl      : "'. \URL::to('app/vendor/ckeditor/kcfinder/upload.php?type=files') .'",
                    filebrowserImageUploadUrl : "'. \URL::to('app/vendor/ckeditor/kcfinder/upload.php?type=images') .'",
                    filebrowserVideoUploadUrl : "'. \URL::to('app/vendor/ckeditor/kcfinder/upload.php?type=videos') .'",
                    filebrowserFlashUploadUrl : "'. \URL::to('app/vendor/ckeditor/kcfinder/upload.php?type=flash') .'"

            });
        </script> 

        <script src="'. \URL::to('app/js/ajax/posts.js') .'"></script>  

        ';

        $tags       = \App\Models\Tags::all(); 
        $categorias = \App\Models\Categorias::all(); 
        
        $dados      = array(
            'tags'      => $tags,
            'categorias'=> $categorias,
            'style'     => $style,
            'script'    => $script
        );        
        return view('admin.blog.novo-post', $dados);
    }


    public function criarNovoPost()
    {
        $input  = \Input::except('_token', 'img');

        if($input['post_categoria_id'] == ''){
            return 'categoriavazia';
        }else{
            if($input['post_titulo'] == '' || $input['post_conteudo'] == ''){
                return 'camposvazio';
            }else{
                // Preparando o ember do video
                if($input['post_video'] != ''){
                    $input['post_video'] = VideoID($input['post_video']);
                }

                $input['created_at']    = date("Y-m-d H:i:s"); // Data
                $input['post_slug']     = str_slug($input['post_titulo']); // Preparando o slug

                // Uploads
                $file       = \Input::file('img');
                if (!empty($file)) {
                    $upload = new \App\Library\UploadHelpers();
                    if ($upload->ImageUpload($file)) {
                        $input['post_capa'] = $upload->NomeArquivo(); // Criando o valor a ser enviado para o banco de dados com o nome e caminho do arquivo
                    }
                }

                // tags
                $tags   = \Input::get('post_tags');
                if(is_array($tags) && count($tags) > 0){
                    $input['post_tags'] = implode(",", $tags);
                }

                $create = \App\Models\Posts::create($input);
                if($create){
                    return 'sucesso';
                }
            }
        }
    }

    public function editarPost($id)
    {
        $id = base64_decode($id);

        $style  = '
        <!-- TAGS INPUT-->
        <link rel="stylesheet" href="'. \URL::to('vendor/bootstrap-tagsinput/dist/bootstrap-tagsinput.css').'">
        <!-- CHOSEN-->
        <link rel="stylesheet" href="'. \URL::to('vendor/chosen_v1.2.0/chosen.min.css').'">
        ';

        $script = '  
        <script src="'. \URL::to('vendor/bootstrap-filestyle/src/bootstrap-filestyle.js').'"></script> 
        <script src="'. \URL::to('vendor/chosen_v1.2.0/chosen.jquery.min.js').'"></script>  
        <!-- TAGS INPUT-->
        <script src="'. \URL::to('vendor/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') .'"></script>

        <!-- CHOSEN-->
        <script src="'. \URL::to('vendor/chosen_v1.2.0/chosen.jquery.min.js') .'"></script>
        <script src="'. \URL::to('app/vendor/ckeditor/ckeditor.js') .'"></script>
        <script>
            CKEDITOR.replace( "j_post", {
                uiColor: "#E1E1E1",
                skin: "office2013",
                
                    filebrowserBrowseUrl      : "'. \URL::to('app/vendor/ckeditor/kcfinder/browse.php?type=files') .'",
                    filebrowserImageBrowseUrl : "'. \URL::to('app/vendor/ckeditor/kcfinder/browse.php?type=images') .'",
                    filebrowserVideoBrowseUrl : "'. \URL::to('app/vendor/ckeditor/kcfinder/browse.php?type=videos') .'",
                    filebrowserFlashBrowseUrl : "'. \URL::to('app/vendor/ckeditor/kcfinder/browse.php?type=flash') .'",
                    filebrowserUploadUrl      : "'. \URL::to('app/vendor/ckeditor/kcfinder/upload.php?type=files') .'",
                    filebrowserImageUploadUrl : "'. \URL::to('app/vendor/ckeditor/kcfinder/upload.php?type=images') .'",
                    filebrowserVideoUploadUrl : "'. \URL::to('app/vendor/ckeditor/kcfinder/upload.php?type=videos') .'",
                    filebrowserFlashUploadUrl : "'. \URL::to('app/vendor/ckeditor/kcfinder/upload.php?type=flash') .'"

            });
        </script> 

        <script src="'. \URL::to('app/js/ajax/posts.js') .'"></script>  

        ';

        $tags       = \App\Models\Tags::all(); 
        $categorias = \App\Models\Categorias::all(); 
        $post       = \App\Models\Posts::where('post_id', $id)->join('categorias', 'posts.post_categoria_id', '=', 'categorias.cat_id')->first(); 
        
        
        $dados      = array(
            'post'      => $post,
            'tags'      => $tags,
            'categorias'=> $categorias,
            'style'     => $style,
            'script'    => $script
        );        
        return view('admin.blog.editar-post', $dados);

    }
    

    /**
     * COMENTARIOS
     *
     * @return Response
     */
    public function comentarios()
    {
        $style  = '
        <link rel="stylesheet" href="'. \URL::to('vendor/datatables-colvis/css/dataTables.colVis.css') .'">
        <link rel="stylesheet" href="'. \URL::to('app/vendor/datatable-bootstrap/css/dataTables.bootstrap.css') .'">
        ';

        $script = '  
        <script src="'. \URL::to('vendor/bootstrap-filestyle/src/bootstrap-filestyle.js').'"></script> 
        <script src="'. \URL::to('vendor/chosen_v1.2.0/chosen.jquery.min.js').'"></script>
         
        <script src="'. \URL::to('vendor/datatables/media/js/jquery.dataTables.min.js') .'"></script>
        <script src="'. \URL::to('vendor/datatables-colvis/js/dataTables.colVis.js') .'"></script>
        <script src="'. \URL::to('app/vendor/datatable-bootstrap/js/dataTables.bootstrap.js') .'"></script>
        <script src="'. \URL::to('app/vendor/datatable-bootstrap/js/dataTables.bootstrapPagination.js') .'"></script>
        <script src="'. \URL::to('app/js/demo/demo-datatable.js') .'"></script>    
        <script src="'. \URL::to('app/js/ajax/comentarios.js') .'"></script>       
        ';
        
        $dados      = array(
            'style'     => $style,
            'script'    => $script
        );        
        return view('admin.blog.comentarios', $dados);
    }

    /**
     * CATEGORIAS
     *
     * @param  Request  $request
     * @return Response
     */
    public function categorias()
    {
        $style  = '
        <link rel="stylesheet" href="'. \URL::to('vendor/datatables-colvis/css/dataTables.colVis.css') .'">
        <link rel="stylesheet" href="'. \URL::to('app/vendor/datatable-bootstrap/css/dataTables.bootstrap.css') .'">
        ';

        $script = '  
        <script src="'. \URL::to('vendor/bootstrap-filestyle/src/bootstrap-filestyle.js').'"></script> 
        <script src="'. \URL::to('vendor/chosen_v1.2.0/chosen.jquery.min.js').'"></script>
         
        <script src="'. \URL::to('vendor/datatables/media/js/jquery.dataTables.min.js') .'"></script>
        <script src="'. \URL::to('vendor/datatables-colvis/js/dataTables.colVis.js') .'"></script>
        <script src="'. \URL::to('app/vendor/datatable-bootstrap/js/dataTables.bootstrap.js') .'"></script>
        <script src="'. \URL::to('app/vendor/datatable-bootstrap/js/dataTables.bootstrapPagination.js') .'"></script>
        <script src="'. \URL::to('app/js/demo/demo-datatable.js') .'"></script>    
        <script src="'. \URL::to('app/js/ajax/categorias.js') .'"></script>       
        ';
        
        $dados      = array(
            'style'     => $style,
            'script'    => $script
        );        
        return view('admin.blog.categorias', $dados);
    }

    public function novaCategoria()
    {
        $input = \Input::all();

        if(!empty($input['cat_titulo'])){
            $ver = \App\Models\Categorias::where('cat_titulo', $input['cat_titulo'])->first();
            if(count($ver) > 0){
                return 'jaexiste';
            }else{
                $input['created_at']    = date("Y-m-d H:i:s");
                $input['cat_slug']      = str_slug($input['cat_titulo']);

                $create = \App\Models\Categorias::create($input);
                if($create){
                    return 'sucesso';
                }
            }
        }else{  
            return 'vazio';
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function tags()
    {
        $style  = '
        <link rel="stylesheet" href="'. \URL::to('vendor/datatables-colvis/css/dataTables.colVis.css') .'">
        <link rel="stylesheet" href="'. \URL::to('app/vendor/datatable-bootstrap/css/dataTables.bootstrap.css') .'">
        ';

        $script = '  
        <script src="'. \URL::to('vendor/bootstrap-filestyle/src/bootstrap-filestyle.js').'"></script> 
        <script src="'. \URL::to('vendor/chosen_v1.2.0/chosen.jquery.min.js').'"></script>
         
        <script src="'. \URL::to('vendor/datatables/media/js/jquery.dataTables.min.js') .'"></script>
        <script src="'. \URL::to('vendor/datatables-colvis/js/dataTables.colVis.js') .'"></script>
        <script src="'. \URL::to('app/vendor/datatable-bootstrap/js/dataTables.bootstrap.js') .'"></script>
        <script src="'. \URL::to('app/vendor/datatable-bootstrap/js/dataTables.bootstrapPagination.js') .'"></script>
        <script src="'. \URL::to('app/js/demo/demo-datatable.js') .'"></script>    
        <script src="'. \URL::to('app/js/ajax/tags.js') .'"></script>       
        ';
        
        $dados      = array(
            'style'     => $style,
            'script'    => $script
        );        
        return view('admin.blog.tags', $dados);
    }

    /**
     * NOVA TAG
     *
     * @return Response
     */
    public function novaTag()
    {
        $tags = \Input::get("tag_titulo");
        $tags = explode(",", $tags);

        if(is_array($tags))
        {
            foreach($tags as $tag)
            {
                $verTags = \App\Models\Tags::where('tag_titulo', $tag)->first();                
                if(count($verTags <= 0) ){
                     \App\Models\Tags::create(array('tag_titulo' => $tag, 'tag_slug' => str_slug($tag), 'created_at' => date("Y-m-d H:i:s")));
                }
            }
            return 'sucesso';
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
