<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use Redirect;

use App\Http\Requests;
use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;

class LogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('admin.auth.login');
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
     * LOGIN
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(LoginRequest $request)
    {
        if(Auth::attempt(['email' => $request['email'], 'password' => $request['password']])):
            return 'sucesso';
        else:
            return 'erro';
        endif;
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
    public function editar($id)
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
    public function logout()
    {
       Auth::logout();
       return Redirect::to('login');
    }
}
