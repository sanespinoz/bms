<?php

namespace App\Http\Middleware;
use Illuminate\Contracts\Auth\Guard;
use Closure;
use Session;


class Area
{

    protected $auth;
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    /**
     * A todo usuario distinto de area y mantenimiento no le permite el acceso
     * user area id 6 y 5
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)

    {
        $id_rol_user = $this->auth->user()->rol_id;
        
        if( $id_rol_user != 6 )
    {
            Session::flash('message-error', 'Sin privilegios');
            return redirect()->to('gestion');
    }    
        return $next($request);
    }
}
