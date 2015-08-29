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
     * Show the form for creating a new resource.
     *
     * @return Response
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
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
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
