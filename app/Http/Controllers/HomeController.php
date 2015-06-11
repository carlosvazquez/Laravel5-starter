<?php namespace App\Http\Controllers;

use Jenssegers\Date\Date as Date;

class HomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		#$this->middleware('guest');
	}

	/**
	 * Show the application home screen to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
        Date::setLocale('es');

        $fecha = Date::now('America/Tijuana')->format('l j F Y H:i:s');

		return view('homepage.index', compact('fecha'));
	}



}
