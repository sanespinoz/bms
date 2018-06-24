<?php

namespace App\Http\Middleware;
use Illuminate\Contracts\Auth\Guard;
use Closure;
use Session;


class Mantenimiento
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
    public function handle($request, Closure $next)
    {
		$id_rol_user = $this->auth->user()->rol_id;
		
		if( $id_rol_user != 5 &&  $id_rol_user != 1)
	{
			Session::flash('message-error', 'Sin privilegios');
			return redirect()->to('gestion');
	}    
        return $next($request);
    }
}
