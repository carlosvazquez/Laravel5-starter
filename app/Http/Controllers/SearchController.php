<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;


use App\Install;
use Auth;
use Jenssegers\Date\Date;
use Illuminate\Support\Facades\Validator;
use Laracasts\Flash\Flash;
use Illuminate\Support\Facades\Request;


class SearchController extends Controller {
	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
    {
        $resultados ='';
        $data = Request::all();

        if($data) {
            $campo_os = $data['campo_os'];
            $resultados = Install::where('os', 'LIKE', '%'.$campo_os.'%')->get();
        }
        $title 	= 'Eistel | Buscador de orden de Servicio';
        $body 	= 'ospanel';

        return view('search.index', compact('title','body','resultados'));
    }

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */

}
