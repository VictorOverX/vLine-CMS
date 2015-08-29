<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Http\Requests;
use App\Http\Controllers\Controller;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
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
        <script src="'. \URL::to('app/js/ajax/usuarios.js') .'"></script>       
        ';

        $usuarios   = \App\Models\User::join('details', 'users.id', '=', 'details.detail_perfil_id')->get();
        $dados      = array(
            'usuarios'  => $usuarios,
            'style'     => $style,
            'script'    => $script
        );        
        return view('admin.usuarios.index', $dados);
    }

    /**
     * CRIANDO UM NOVO USUÁRIO | CREATING NEW USER
     * Metodo para cadastramento de novo usuário, retorna mensagem para notificação ajax
     * @return Response
     * Ajax - usuario.js
     */
    public function novoUser()
    {
        $senha_a  = \Input::get('password');
        $senha_b  = \Input::get('rep_password');

        $input    = \Input::except('_token', 'img', 'rep_password', 'password', '_');

        if($input['name'] == '' || $input['email'] == '' || $senha_a == '' || $senha_b == '')
        {
            return 'camposvazio';
        }else{
            if($senha_a == $senha_b){
                //Preparando pra salvar a senha no banco de dados
                $input['password']      = \Hash::make($senha_a); 
            }else{
                return 'senhanaoconfere';
            }
            //gerar uma senha
            //$senha  = \App\Library\CoreHelpers::geraSenha(6);

            // Enviando email com a senha
            /*
            $data = array(
                'site'  => CNF_COMNAME,
                'senha' => $senha,
                'nome'  => $input['name'],
                'email' => $input['email']
            );
         
            \Mail::send('emails.nova-senha', $data, function ($m) use ($data) 
            {
                $m
                ->to($data['email'], CNF_COMNAME)
                ->subject('Nova senha no sistema - '. CNF_COMNAME);
            });
            */

            //Data Atual
            $input['created_at']    = date('Y-m-d H:i:s');    

            // Criando um usuário
            $create = \App\Models\User::create($input);
            
            if($create)
            {
                //Ultimo ID
                $ultimo_id  = $create->id;

                // fazendo upload do avatar
                $avatar     = '';
                
                $file       = \Input::file('img');
                if (!empty($file)) {
                    $upload = new \App\Library\UploadHelpers();
                    if ($upload->ImageUpload($file)) {
                        $avatar = $upload->NomeArquivo(); // Criando o valor a ser enviado para o banco de dados com o nome e caminho do arquivo
                    }
                }
                

                $details = \App\Models\Details::create(array('detail_perfil_id' => $ultimo_id, 'detail_avatar' => $avatar, 'created_at' => date('Y-m-d H:i:s')));
                if($details)
                {
                    return 'sucesso';
                }
            }
        }
    }

    /**
     * LENDO DADOS DE USUARIO
     *
     * @param  Request  $request
     * @return Response
     */
    public function readUser($id)
    {
        $user = \App\Models\User::where('id', $id)->join('details', 'users.id', '=', 'details.detail_perfil_id')->first();
        if(count($user) > 0){
            return \Response::json($user);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function updateUser()
    {
        $senha_a  = \Input::get('password');
        $senha_b  = \Input::get('rep_password');
        $id       = \Input::get('id');

        $input    = \Input::except('_token', 'img', 'rep_password', 'password', '_', 'id');

        if($input['name'] == '' || $input['email'] == '')
        {
            return 'camposvazio';
        }else{
            if($senha_a != '' && $senha_b != ''){
                if($senha_a == $senha_b){
                    //Preparando pra salvar a senha no banco de dados
                    $input['password']      = \Hash::make($senha_a); 
                }else{
                    return 'senhanaoconfere';
                }
            }                

            //Data Atual
            $input['updated_at'] = date('Y-m-d H:i:s');    

            // Criando um usuário
            $update = \App\Models\User::where("id", $id)->update($input);
            
            if($update)
            {
                $dados_details = array(
                    'detail_perfil_id'  => $id,
                    'updated_at'        => date('Y-m-d H:i:s')
                );

                // fazendo upload do avatar
                                
                $file       = \Input::file('img');
                if (!empty($file)) {
                    $upload = new \App\Library\UploadHelpers();

                    // Verificando se existe
                    $imagem = \App\Models\Details::where("detail_perfil_id", $id)->where("detail_avatar", "!=", '')->first();
                    if (isset($imagem) && $imagem->detail_avatar != '' && \File::exists('uploads/' . $imagem->detail_avatar)) {
                        \File::delete('uploads/' . $imagem->detail_avatar);
                    }

                    if ($upload->ImageUpload($file)) {
                        $dados_details['detail_avatar'] = $upload->NomeArquivo(); // Criando o valor a ser enviado para o banco de dados com o nome e caminho do arquivo
                    }
                }

                

                $details = \App\Models\Details::where("detail_perfil_id", $id)->update($dados_details);
                if($details)
                {
                    return 'sucesso';
                }
            }

        }
    }

   
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $user = \App\Models\User::all();
        if(count($user) > 1)
        {
            if(!empty($id))
            {
                // Verificando se existe imagem
                $imagem = \App\Models\Details::where("detail_perfil_id", $id)->where("detail_avatar", "!=", '')->first();
                if (isset($imagem) && $imagem->detail_avatar != '' && \File::exists('uploads/' . $imagem->detail_avatar)) {
                    \File::delete('uploads/' . $imagem->detail_avatar);
                }

                $delete = \App\Models\User::where("id", $id)->delete();
                if($delete)
                {
                     $details = \App\Models\Details::where("detail_perfil_id", $id)->delete();
                     if($details)
                     {
                        return 'sucesso';
                     }
                }
            }

        }else{
            return 'ultimousuario';
        }        
    }
}
