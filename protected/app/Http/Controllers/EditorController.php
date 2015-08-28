<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use ZipArchive;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class EditorController extends Controller
{
   
    protected $path     = "";
    protected $files    = array();

    public function __construct()
    {
        
    }
        
    public function editorArquivo()
    {
        $style  = '';
        $script = '        
        <script src="'. \URL::to('vendor/ace-editor/src-noconflict/ace.js') .'" type="text/javascript" charset="utf-8"></script>
        <script src="'. \URL::to('app/js/ajax/editor.js') .'"></script>       
        ';


        $this->getFiles();
        $dados = array(
            'files'     => $this->files,
            'style'     => $style,
            'script'    => $script
        );        
        return view('admin.editor.index', $dados);
    }

    public function editorLayout()
    {
        $style  = '';
        $script = '        
        <script src="'. \URL::to('vendor/bootstrap-filestyle/src/bootstrap-filestyle.js').'"></script> 
        <script src="'. \URL::to('vendor/chosen_v1.2.0/chosen.jquery.min.js').'"></script>
       
        <script src="'. \URL::to('vendor/ace-editor/src-noconflict/ace.js') .'" type="text/javascript" charset="utf-8"></script>
        <script src="'. \URL::to('app/js/ajax/editor-layout.js') .'"></script>       
        ';

        $dados = array(
            'style'     => $style,
            'script'    => $script
        );        
        return view('admin.editor.editor-layout', $dados);
    }

  

    public function novoArquivo()
    {
        $this->getFiles();
        $nameFile = str_slug(\Input::get('nome_arq'));
        if(\Input::get('controller_rota') != null && \Input::get('controller_rota') == 'on'){
            if(\File::exists($this->path . $nameFile . ".blade.php"))
            {
                return 'nomeexiste';
            }else{
                // Criando Rota                
                $rota               =  file(app_path('Http/Routes/layoutRoutes.php')); 
                $nova_rota          =  "\n". 'Route::get("'.$nameFile.'", "Layout\\'.ucfirst($nameFile) .'Controller'.'@get'.ucfirst($nameFile).'");';  
                                    array_push($rota, $nova_rota);
                $LayoutRotas        = '';
                foreach($rota as $rotas)
                {
                    $LayoutRotas  .= $rotas;
                }
                

                $filename       = app_path('Http/Routes/layoutRoutes.php');
                $fp             = fopen($filename, "w+"); 
                                  fwrite($fp, $LayoutRotas); 
                                  fclose($fp);

                // Criando Controller
                $controller         = app_path('Http/Controllers/Layout/');
                $novo_controller    = fopen($controller . ucfirst($nameFile) . 'Controller.php','w+');
                if($novo_controller == false)
                {
                    return 'errocontroller';
                }else{
                    $conteudoController   = file_get_contents($this->path . "base/controller.txt");
                    $conteudoController   = str_replace('BaseController', ucfirst($nameFile) .'Controller', $conteudoController); 
                    $conteudoController   = str_replace('baselayou', 'themes.linexti.'.$nameFile, $conteudoController); 
                    $conteudoController   = str_replace('index', 'get'.ucfirst($nameFile), $conteudoController); 

                    $filename   = $controller . ucfirst($nameFile) . 'Controller.php';
                    $fp         = fopen($filename, "w+"); 
                                  fwrite($fp, $conteudoController); 
                                  fclose($fp);
                }

                // Criando arquivo
                $arquivo = fopen($this->path . $nameFile . ".blade.php",'w+');
                if ($arquivo == false)
                {
                    return 'erroview';
                }else{
                    $conteudo   = file_get_contents($this->path . "base/layout.txt");
                    $filename   = $this->path . $nameFile . ".blade.php";
                    $fp         = fopen($filename, "w+"); 
                                  fwrite($fp, $conteudo); 
                                  fclose($fp);

                    return 'sucesso';
                }
            }
        }else{
           $arquivo = fopen($this->path . $nameFile . ".blade.php",'w+');
            if ($arquivo == false)
            {
                return 'erroview';
            }else{
                $conteudo   = file_get_contents($this->path . "base/layout.txt");
                $filename   = $this->path . $nameFile . ".blade.php";
                $fp         = fopen($filename, "w+"); 
                              fwrite($fp, $conteudo); 
                              fclose($fp);

                return 'sucesso';
            }
        }
    }


    public function readFile()
    {
        $this->getFiles();
        $dataFile = \Input::get("dataFile");
        $dataType = \Input::get("dataType");
        
        if($dataFile != '')
        {   
            switch ($dataType) {
                case 'view':
                    if(\File::exists($this->path . $dataFile . ".blade.php")){
                        $filename = $this->path . $dataFile . ".blade.php";
                        $content  = file_get_contents($filename);

                        return $content;
                    }else{
                        return 'naoexiste';
                    }
                    break;
                case 'controller':
                    if(\File::exists(app_path('Http/Controllers/Layout/' . $dataFile . '.php'))){
                        $filename = app_path('Http/Controllers/Layout/' . $dataFile . '.php');
                        $content  = file_get_contents($filename);

                        return $content;
                    }else{
                        return 'naoexiste';
                    }
                    break;
                case 'routes':
                    if(\File::exists(app_path('Http/Routes/' . $dataFile . '.php'))){
                        $filename = app_path('Http/Routes/' . $dataFile . '.php');
                        $content  = file_get_contents($filename);

                        return $content;
                    }else{
                        return 'naoexiste';
                    }
                    break;
            }            
        }else{
            return 'erro';
        }        
    }

    public function readAllFile()
    {
        $resultado = array();

        $this->getFiles();
        if(!empty($this->files)){
            $resultado['files']         = $this->files;
        }

        $this->getControllers(); 
        if(!empty($this->getControllers()))
        {
            $resultado['controller']    = $this->getControllers();
        }

        $this->getRoutes(); 
        if(!empty($this->getRoutes()))
        {
            $resultado['rotas']         = $this->getRoutes();
        } 

        return json_encode($resultado);
    }

   
    public function saveFile()
    {
        $this->getFiles();
        $dataFile = \Input::get("dataFile");
        $conteudo = \Input::get("conteudo");
        $dataType = \Input::get("dataType");

        if($dataFile != '' && $conteudo != '')
        {
            switch ($dataType) {
               case 'view':
                   if(\File::exists($this->path . $dataFile . ".blade.php")){
                        $filename   = $this->path . $dataFile . ".blade.php";
                        $fp         = fopen($filename, "w+"); 
                                      fwrite($fp, $conteudo); 
                                      fclose($fp); 
                        return 'sucesso';
                    }else{
                        return 'vazio';
                    }
                   break;
               
               case 'controller':
                   if(\File::exists(app_path('Http/Controllers/Layout/' . $dataFile . '.php'))){
                        $filename   = app_path('Http/Controllers/Layout/' . $dataFile . '.php');
                        $fp         = fopen($filename, "w+"); 
                                      fwrite($fp, $conteudo); 
                                      fclose($fp); 
                        return 'sucesso';
                    }else{
                        return 'vazio';
                    }
                   break;

                case 'routes':
                   if(\File::exists(app_path('Http/Routes/' . $dataFile . '.php'))){
                        $filename   = app_path('Http/Routes/' . $dataFile . '.php');
                        $fp         = fopen($filename, "w+"); 
                                      fwrite($fp, $conteudo); 
                                      fclose($fp); 
                        return 'sucesso';
                    }else{
                        return 'vazio';
                    }
                   break;
               }   
            
        }else{
            return 'erro';
        } 

    }

    private function getFiles()
    {
        $this->path = base_path() . "/resources/views/themes/linexti/"; 
        $output     = str_replace("/", "\\", $this->path);  
        $diretorio  = dir($output);   

        while($arquivo = $diretorio->read()){ 
            if($arquivo !== '..' && $arquivo !== '.' && $arquivo !== 'base' && $arquivo !== 'assets')
            {
                $file = explode(".blade.php", $arquivo);
                array_push($this->files, $file[0]);  
            }                      
        } 

        return $this->files;
        $diretorio->close();
    }

    private function getControllers()
    {
        $files      = array();
        $path       = app_path('Http/Controllers/Layout/'); 
        $output     = str_replace("/", "\\", $path);  
        $diretorio  = dir($output);   

        while($arquivo = $diretorio->read()){ 
            if($arquivo !== '..' && $arquivo !== '.')
            {
                $file = explode(".php", $arquivo);
                array_push($files, $file[0]);  
            }                      
        } 

        return $files;
        $diretorio->close();
    }

    public function getRoutes()
    {
        $files      = array();
        $path       = app_path('Http/Routes/'); 
        $output     = str_replace("/", "\\", $path);  
        $diretorio  = dir($output);   

        while($arquivo = $diretorio->read()){ 
            if($arquivo !== '..' && $arquivo !== '.' && $arquivo == 'layoutRoutes.php')
            {
                $file = explode(".php", $arquivo);
                array_push($files, $file[0]);  
            }                      
        } 

        return $files;
        $diretorio->close();
    }

    public function excluirArquivo()
    {
        $this->getFiles();
        $dataFile = \Input::get("dataFile");
        $dataType = \Input::get("dataType");

        if($dataFile != '' && $dataType != ''){
            switch ($dataType) {
                case 'view':
                        if(\File::exists($this->path . $dataFile . ".blade.php")){
                            $filename   = $this->path . $dataFile . ".blade.php";
                            
                            \File::delete($filename);

                            $filename           = app_path('Http/Routes/layoutRoutes.php');
                            $arquivoRota        = file_get_contents(app_path('Http/Routes/layoutRoutes.php'));
                            $nomeRota           = 'Route::get("'.$dataFile.'", "Layout\\'.ucfirst($dataFile) .'Controller'.'@get'.ucfirst($dataFile).'");';  
                            $arquivoRota        = str_replace($nomeRota, '', $arquivoRota);
                                                        
                            $fp             = fopen($filename, "w+"); 
                                              fwrite($fp, $arquivoRota); 
                                              fclose($fp);
                            return 'sucesso';
                        }else{
                            return 'vazio';
                        }
                    break;
                
                case 'controller':
                        if(\File::exists(app_path('Http/Controllers/Layout/' . $dataFile . '.php'))){
                            $filename   = app_path('Http/Controllers/Layout/' . $dataFile . '.php');
                            
                            \File::delete($filename);
                            return 'sucesso';
                        }else{
                            return 'vazio';
                        }
                    break;

                case 'routes':
                    if($dataFile == 'layoutRoutes'){
                        return 'naodeletar';
                    }else{
                        if(\File::exists(app_path('Http/Routes/' . $dataFile . '.php'))){
                            $filename   = app_path('Http/Routes/' . $dataFile . '.php');
                            
                            \File::delete($filename);
                            return 'sucesso';
                        }else{
                            return 'vazio';
                        }
                    }
                    break;
            }
        }else{
            return 'erro';
        }
    }



    /* EDITOR LAYOUT ************************************************************************/

    public function readLayout()
    {
        $layout     = base_path() . "/resources/views/themes/layout.blade.php"; 
        $content    = file_get_contents($layout);
        return $content;
    }

    public function saveLayout()
    {
        $content = \Input::get('conteudo');
        if($content == ''){
            return 'vazio';
        }else{
            $layout     = base_path() . "/resources/views/themes/layout.blade.php"; 
            $fp         = fopen($layout, "w+"); 
                          fwrite($fp, $content); 
                          fclose($fp);
            return 'sucesso';
        }
    }

    public function openConstrutor()
    {
        $style  = '';
        $script = '        

        ';


        $dados = array(
            'style'     => $style,
            'script'    => $script
        );        
        return view('layout.index', $dados);
    }

    public function sendLayout(Request $request)
    {
        if (\Input::file('file')->isValid()) {

            $destinationPath  = 'uploads'; 
            $extension        = \Input::file('file')->getClientOriginalExtension(); 
            $fileName         = 'layout.'.$extension; 
            if(file_exists('uploads/' . $fileName)){
                \File::delete('uploads/' . $fileName);
            }

            if($extension != 'zip'){
                return 'formatoinvalido';
            }else{
                $upload_success   = \Input::file('file')->move($destinationPath, $fileName); 
                if($upload_success){
                    // Extraindo os arquivos
                    $arquivo = 'uploads/layout.zip';
                    $destino = base_path() . "/resources/views/themes/linexti/assets/";

                    $zip = new ZipArchive;
                    $zip->open($arquivo);
                    if($zip->extractTo($destino) == TRUE){
                        $zip->close();
                        \File::delete('uploads/layout.zip');
                        return 'sucesso';                        
                    }else{
                        return 'erro';
                    }
                }
            }
        }
    }

    public function removeAssets()
    {
        $pasta = base_path() . "/resources/views/themes/linexti/assets/";
        
        if(\File::isDirectory($pasta))
        {
            $success = \File::cleanDirectory($pasta);
            if($success){
                return 'sucesso';
            }
        }else{
            return 'diretoriovazio';
        }
        
    }



}
