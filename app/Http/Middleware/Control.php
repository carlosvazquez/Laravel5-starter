<?php namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;

class Control {

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
        if ($this->auth->user()->type == 'contralor')
        {

            if ($request->ajax())
            {
                return response('Unauthorized.', 401);
            }
            else
            {
                flash()->error('Nnnnno tiene permiso para acceder a la ruta.');
                return redirect()->to('ospanel');
            }
        }

		return $next($request);
	}

}
