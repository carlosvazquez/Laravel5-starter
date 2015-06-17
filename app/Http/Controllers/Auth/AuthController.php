<?php
namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;

class AuthController extends Controller {

    use AuthenticatesAndRegistersUsers;

    public function __construct(Guard $auth, Registrar $registrar)
    {
        $this->auth = $auth;
        $this->registrar = $registrar;

        $this->middleware('guest', ['except' => 'getLogout']);

    }

    public function getLogin()
    {
        $body 	= 'loginpage';

        return view('auth.login', compact('body'));
    }


    //protected $redirectPath = '/dashboard';

    public function postLogin(Request $request)
    {
        //pass through validation rules
        $this->validate($request, ['username' => 'required', 'password' => 'required']);

        $credentials = [
            'username' => trim($request->get('username')),
            'password' => trim($request->get('password'))
        ];

        $remember = $request->has('remember');

        //log in the user
        if ($this->auth->attempt($credentials, $remember)) {
            return redirect()->intended('/');
        }

        //show error if invalid data entered
        return redirect()->back()->withErrors('Login/Pass do not match')->withInput();
    }
    public function logout()
    {
        $this->auth->logout();

        flash()->success('Te has desconectado con éxito.');

        return redirect('/');


        #Auth::logout();
        #$this->auth->logout();
        #flash()->success('Te has desconectado con éxito.');
        #return redirect('/');
        Session::flush();

    }

}
