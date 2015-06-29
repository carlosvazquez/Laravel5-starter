<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;

use Carbon\Carbon;
use App\Install;
use Auth;
use Jenssegers\Date\Date;
use Illuminate\Support\Facades\Validator;
use Laracasts\Flash\Flash;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\DB;


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

	public function index()
    {
        $tecnicos = User::where('type', '=', 'tecnico')->lists('username', 'id');
        $area = DB::table('areas')->lists('name', 'id');
        $status = DB::table('statuses')->lists('slug', 'id');
        $title 	= 'Eistel | Buscador de orden de Servicio';
        $body 	= 'ospanel';
        return view('search.index', compact('title','body','tecnicos','area','status'));
    }


    public function results()
    {
        $usuario = false;
        $id_status = false;
        if(Auth::user()->is('admin') or Auth::user()->is('contralor')) {
            $usuario = true;
        }
        $data = Request::all();
        $ini_dia = isset($data['ini_dia']) ? $data['ini_dia'] : false;

        if($ini_dia == false) {
            flash()->error('Vuelva a intentar la búsqueda');
            return redirect('search');
        }
        $ini_dia = $data['ini_dia'];
        $fin_dia = $data['fin_dia'];
        $fin_dia = Carbon::parse($fin_dia)->addDay();
        if(empty($data['empleado'])){
            $empleado = false;
        } else {
            $empleado = $data['empleado'];
        }

        if($empleado) {
            $id_empleado = $data['id_empleado'];
            $c_empleado = '=';
        } else {
            $id_empleado = 0;
            $c_empleado = '!=';
        }

        $status = $data['status'];
        if($status) {
            $id_status = $data['id_status'];
            $c_status = '=';
        } else {
            $id_status = 0;
            $c_status = '!=';
        }

        if(empty($area['area'])){
            $area = false;
        } else {
            $area = $data['area'];
        }

        if($area) {
            $id_area = $data['id_area'];
            $c_area = '=';
        } else {
            $id_area = 0;
            $c_area = '!=';
        }

        //Si eres admin o contralor
        if($usuario) {
                $id_empleado = $data['id_empleado'];
                $resultados = Install::with('user')
                    ->with('area')
                    ->with('division')
                    ->with('status')
                    ->with('responsable')
                    ->with('reporte')
                    ->with('cancelacion')
                    ->where('area_id', $c_area, $id_area)
                    ->where('user_id', $c_empleado, $id_empleado)
                    ->where('status_id', $c_status, $id_status)
                    ->where('created_at', '>', $ini_dia)
                    ->where('created_at', '<', $fin_dia)->get();
            } else {
            $id_empleado = Auth::user()->id;
            $resultados = Install::with('user')
                ->with('area')
                ->with('division')
                ->with('status')
                ->with('responsable')
                ->with('reporte')
                ->with('cancelacion')
                ->where('user_id', '=', $id_empleado)
                ->where('status_id', $c_status, $id_status)
                ->where('created_at', '>', $ini_dia)
                ->where('created_at', '<', $fin_dia)->get();
        }


        $title 	= 'Eistel | Resultados de la búsqueda';
        $body 	= 'ospanel';
        return view('search.results', compact('title','body','resultados','tecnicos','area','status'));

    }



}
