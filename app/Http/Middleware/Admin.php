<?php namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;

class Admin {

    private $auth;

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
        if ($this->auth->user()->type != 'admin')
        {

            if ($request->ajax())
            {
                return response('Unauthorized.', 401);
            }
            else
            {
                flash()->error('No tiene permiso para acceder a la ruta.');
                return redirect()->to('ospanel');
            }
        }

		return $next($request);
	}

}
