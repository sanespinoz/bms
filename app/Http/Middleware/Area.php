<?php

namespace App\Http\Middleware;
use Illuminate\Contracts\Auth\Guard;
use Closure;
use Session;


class Operador
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
        if ($this->auth->check()) {
            switch ($this->auth->user()->rol_id)
            {

                case '7':
                    # Administrador
                    return redirect()->to('admin');
                    break;

                case '8':
                    # Operador
                    return redirect()->to('operador');
                    break;

                case '9':
                    # Mantenimiento
                    return redirect()->to('mantenimiento');
                    break;

                case '10':
                    # Area
                    //return redirect()->to('area');
                    break;
            }
            return redirect('operador');
        }
        return $next($request);
    }
}
