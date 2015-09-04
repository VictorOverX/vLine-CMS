<?php

namespace App\Http\Middleware;

use Illuminate\Contracts\Auth\Guard;
use Session;
use Closure;

class NivelUser
{

    protected $auth;

    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        if(strripos($role, "|")):
            $role = explode("|", $role);
            if(is_array($role) && !in_array($this->auth->user()->nivel, $role)):
                \Session::flash('message-error', 'Você não tem permissão para acessar essa parte do sistema!');
                return redirect()->to('login');  
            endif;
        else:
            if ($this->auth->user()->nivel != $role) {
                \Session::flash('message-error', 'Você não tem permissão para acessar essa parte do sistema!');
                return redirect()->to('login');                
            }
        endif;
        
        return $next($request);
    }
}
