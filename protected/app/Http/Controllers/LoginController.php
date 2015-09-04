<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use Redirect;

use App\Http\Requests;
use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;

class LoginController extends Controller
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
     * LOGIN
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(LoginRequest $request)
    {
        if($request->has('email') and $request->has('password')):
            $remember = true;
            if(Auth::attempt(['email' => $request['email'], 'password' => $request['password']], $remember)):
                return 'sucesso';
            else:
                return 'erro';
            endif;
        endif;
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
