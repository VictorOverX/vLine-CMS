<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tags;
use App\Models\Posts;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class BlogController extends Controller
{
    public function __construct()
    {
         //$this->middleware('nivelUser:3')
    }

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

        $posts      =    \App\Models\Posts::getPostsCategorias();
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

                if(!isset($input['post_data']) || $input['post_data'] == ''){
                    $input['post_data'] = date("Y-m-d H:i:s"); // Data
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

                // Autor
                $input['post_autor'] = \Auth::user()->id;

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
        $post       = \App\Models\Posts::getPostCategoria();
        
        
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
     * EDITANDO POST || EDIT POST
     *
     * @return Response
     */
    public function editandoPost()
    {
        $id     = \Input::get('id'); // Pega o ID
        $tagsG  = (is_array(\Input::get('post_tags')) && !in_array("",\Input::get('post_tags')) ? \Input::get('post_tags') : array());
        $input  = \Input::except('_token', 'img', 'id', 'post_tags'); // Pega todos os campos menos, token, img e id

        if(empty($id)){
            return 'idvazio'; // Se o id estiver vazio volta erro
        }else{
            if($input['post_categoria_id'] == ''){
                return 'categoriavazia';
            }else{
                if($input['post_titulo'] == '' || $input['post_conteudo'] == ''){
                    return 'camposvazio';
                }else{
                    // Preparando o ember do video
                    if($input['post_video'] != ''){
                        $input['post_video'] = VideoID($input['post_video']); // Pega o ID do vídeo
                    } // Se o campo video for diferente de vazio

                    if(!isset($input['post_data']) || $input['post_data'] == ''){
                        $input['post_data'] = date("Y-m-d H:i:s"); // Data
                    }

                    $input['created_at']    = date("Y-m-d H:i:s"); // Data
                    $input['post_slug']     = str_slug($input['post_titulo']); // Preparando o slug

                    // Upload de imagem
                    $file       = \Input::file('img');
                    if (!empty($file)) {
                        // Verificando se existe
                        $imagem = \App\Models\Posts::where("post_id", $id)->where("post_capa", "!=", '')->first();
                        if (isset($imagem) && $imagem->post_capa != '' && \File::exists('uploads/' . $imagem->post_capa)) {
                            \File::delete('uploads/' . $imagem->post_capa);
                        }

                        // Upload
                        $upload = new \App\Library\UploadHelpers();
                        if ($upload->ImageUpload($file)) {
                            $input['post_capa'] = $upload->NomeArquivo(); // Criando o valor a ser enviado para o banco de dados com o nome e caminho do arquivo
                        }
                    } // verifica se o arquivo está vazio

                    if(count($tagsG) > 0){
                        // tags
                        $tags   = $tagsG; // Pega as tags
                        if(is_array($tags) && count($tags) > 0){
                            $input['post_tags'] = implode(",", $tags); // Cria uma string com as tags
                        } // verifica se é um array com maias de um conteudo
                    }
                        
                    // Autor
                    $input['post_autor'] = \Auth::user()->id;
                    $input['updated_at'] = date('Y-m-d H:i:s');
                    $create = \App\Models\Posts::where("post_id", $id)->update($input); // Atualizando todas as informações
                    if($create){
                        return 'sucesso'; // Retorna sucesso
                    } // Verifica se obteve sucesso
                }
            }
        }
    }

    /**
     * EXCLUIR POST || DELETE POST
     * Metodo para exclusão de post, recebendo como parametro o id do post
     * @return Response
     */
    public function excluirPost($id)
    {
        if(!empty($id)){
            // Verifica se existe imagem
            $imagem = \App\Models\Posts::where("post_id", $id)->where("post_capa", "!=", '')->first();
            if (isset($imagem) && $imagem->post_capa != '' && \File::exists('uploads/' . $imagem->post_capa)) {
                \File::delete('uploads/' . $imagem->post_capa); // Deletando post
            }

            $post   = \App\Models\Posts::where("post_id", $id)->delete(); // Excluindo posst
            if($post){
                return 'sucesso'; // Retorna sucesso
            }// verfica se foi deletado
        }else{
            return 'erro'; // Retorna erro
        } // Verifica se o id vem vazio
    }
    

    /**
     * COMENTARIOS || COMMENTS
     * View para visualização de comentários
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

        $comentarios = \App\Models\Tipo_comentarios::first();
        
        $dados       = array(
            'comentarios'   => $comentarios,
            'style'         => $style,
            'script'        => $script
        );        
        return view('admin.blog.comentarios', $dados);
    }

    /**
     * TIPO DE COMENTARIO || TYPE COMMENT
     * Atuallizar o tipo de comentário || Update type comment
     * @return Response
     */
    public function mudarTipo()
    {
        $tipo_comentario    = \Input::get('tcom_tipo');

        $verTipoComentario  = \App\Models\Tipo_comentarios::all();
        if(count($verTipoComentario) > 0){
            $idtcom = $verTipoComentario[0]->tcom_id;
            if(\App\Models\Tipo_comentarios::where('tcom_id', $idtcom)->update(array('tcom_tipo' => $tipo_comentario, 'updated_at' => date('Y-m-d H:i:s')))){
                return 'atualizado';
            }
        }else{
            if(\App\Models\Tipo_comentarios::create(array('tcom_tipo' => $tipo_comentario, 'created_at' => date('Y-m-d H:i:s')))){
                return 'sucesso';
            }
        }
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
        $categorias = \App\Models\Categorias::all();
        $dados      = array(
            'categorias'    => $categorias,
            'style'         => $style,
            'script'        => $script
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
     * LENDO CATEGORIA || READ CATEGORIA
     *
     * @param  int  $id
     * @return Response
     */
    public function lendoCategoria($id)
    {
        $categorias = \App\Models\Categorias::where('cat_id', $id)->first();
        return \Response::json($categorias);
    }

    /**
     * EDITANDO CATEGORIA || EDIT CATEGORIA
     *
     * @param  array POST
     * @return Response
     */
    public function editarCategoria()
    {
        $titulo = \Input::get('cat_titulo');
        $idcatg = \Input::get('cat_id');

        if($titulo == '' || $idcatg == '')
        {
            return 'campovazio';
        }else{
            if(!empty($titulo)){
                $ver = \App\Models\Categorias::where('cat_titulo', $titulo)->first();
                if(count($ver) > 0){
                    return 'jaexiste';
                }else{
                    $dados = array(
                        'updated_at'    => date("Y-m-d H:i:s"),
                        'cat_slug'      => str_slug($titulo),
                        'cat_titulo'    => $titulo
                    );

                    $update = \App\Models\Categorias::where('cat_id', $idcatg)->update($dados);
                    if($update){
                        return 'sucesso';
                    }
                }
            }else{  
                return 'vazio';
            }
        }
    }

    /**
     * DELETANDO CATEGORIA || DELETE CATEGORIA
     *
     * @param  int  $id
     * @return Response
     */
    public function excluirCategoria($id)
    {
        if($id == ''){
            return 'erro';
        }else{
            $verCatPost = \App\Models\Posts::where('post_categoria_id', $id)->first();
            if(count($verCatPost) > 0){
                \App\Models\Posts::where('post_id', $verCatPost->post_id)->update(array('post_categoria_id' => 0));
            } 

            $categoria   = \App\Models\Categorias::where("cat_id", $id)->delete(); // Excluindo posst
            if($categoria){
                return 'sucesso'; // Retorna sucesso
            }// verfica se foi deletado               
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

        $tags       = Tags::all();
        
        $dados      = array(
            'tags'      => $tags,
            'style'     => $style,
            'script'    => $script
        ); 

        return view('admin.blog.tags', $dados);
    }

    /**
     * NOVA TAG || NEW TAG
     * Cadastramento de novas tags no sistema
     * @param Titulo da Tag
     * @return Response
     */
    public function novaTag()
    {
        $tags = \Input::get("tag_titulo"); // Chega em string com virgulas
        $tags = explode(",", $tags); // Explode as virgulas e tranforma em um array

        if(\Input::get("tag_titulo") == ''){
            return 'campovazio';
        }else{
            if(is_array($tags))
            {
                foreach($tags as $tag)
                {
                    $verTags = \App\Models\Tags::where('tag_titulo', $tag)->first();                
                    if(count($verTags) <= 0 ){
                         \App\Models\Tags::create(array('tag_titulo' => $tag, 'tag_slug' => str_slug($tag), 'created_at' => date("Y-m-d H:i:s")));
                    }else{
                        return 'tagexiste';
                    }
                }
                return 'sucesso';
            }
        }
    }

    /**
     * DELETANDO TAG || DELETE TAG
     *
     * @param  int  $id
     * @return Response
     */
    public function excluirTags($id)
    {
        $tags_first = Tags::where('tag_id', $id)->first();
        $nova_tag_s = '';
        $tags_array = array();

        if(empty($id)){
            return 'campovazio';
        }else{
            $posts  = Posts::all();
            $tags   = array(); 
            if(count($posts) > 0){
                foreach($posts as $post){

                    if(strpos($post->post_tags, (string)$tags_first->tag_id) != false || $post->post_tags == (string)$tags_first->tag_id){
                       
                        $tags = explode(",", $post->post_tags); 
                        if(count($tags) > 0){
                            foreach($tags as $key => $value){
                                if($tags_first->tag_id != $value){
                                    array_push($tags_array, $value);
                                }
                            }

                            $nova_tag_s = implode(",", $tags_array);
                        } 

                        //Atualizando as tags
                        Posts::where('post_id', $post->post_id)->update(array('post_tags' => $nova_tag_s));

                        $nova_tag_s = '';
                        $tags_array = array(); 
                        $tags       = array();                          
                    }
                }
            }
           // Apagando a tag
            
           if( Tags::where('tag_id', $id)->delete() ){
             return 'sucesso';
           }
        }
    }

    /**
     * LENDO TAG || READ TAG
     *
     * @param  int  $id
     * @return Response
     */
    public function lendoTags($id)
    {
        $tags = Tags::where('tag_id', $id)->first();
        return \Response::json($tags);
    }

    /**
     * EDITAR TAG || EDIT TAG
     *
     * @return Response
     */
    public function editarTag()
    {
        $id     = \Input::get('tag_id');
        $tag    = \Input::get('tag_titulo');

        if($id == '' || $tag == ''){
            return 'campovazio';
        }else{
            $verTags = \App\Models\Tags::where('tag_titulo', $tag)->first();                
                if(count($verTags) <= 0 ){
                      $dados = array(
                    'tag_titulo' => $tag,
                    'tag_slug'   => str_slug($tag),
                    'updated_at' => date('Y-m-d H:i:s')      
                );
                if(Tags::where('tag_id', $id)->update($dados)){
                    return 'sucesso';
                }else{
                    return 'semodificacao';
                }
            }else{
                return 'tagexiste';
            }
        }
    }
}
