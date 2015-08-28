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
        <script src="'. \URL::to('vendor/datatables/media/js/jquery.dataTables.min.js') .'"></script>
        <script src="'. \URL::to('vendor/datatables-colvis/js/dataTables.colVis.js') .'"></script>
        <script src="'. \URL::to('app/vendor/datatable-bootstrap/js/dataTables.bootstrap.js') .'"></script>
        <script src="'. \URL::to('app/vendor/datatable-bootstrap/js/dataTables.bootstrapPagination.js') .'"></script>
        <script src="'. \URL::to('app/js/demo/demo-datatable.js') .'"></script>    
        <script src="'. \URL::to('app/js/ajax/usuarios.js') .'"></script>       
        ';

        $dados = array(
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
    public function create()
    {
        //
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
