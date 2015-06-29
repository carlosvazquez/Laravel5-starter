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
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

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
        if(Auth::user()->is('admin') or Auth::user()->is('contralor')) {
            $usuario = true;
        }
        $c_empleado = '!=';
        $c_status = '!=';
        $c_area = '!=';
        $data = Request::all();
        if(empty($data['empleado'])){
            $empleado = false;
            $query_empleado = "->where('user_id','=',',*)";
        } else {
            $empleado = $data['empleado'];
            $query_empleado = "->where('user_id',.$c_empleado.','.$id_empleado.')'";
        }
        if(empty($data['status'])){ $status = false; } else { $status = $data['status'];}
        if(empty($data['id_status'])){ $id_status = false;} else {$id_status = $data['id_status'];}
        if(empty($data['area'])){ $area = false; } else { $area = $data['area'];}
        if(empty($data['ini_dia'])){ $ini_dia = false; } else { $ini_dia = $data['ini_dia']; }
        if(empty($data['fin_dia'])){ $fin_dia = false; } else { $fin_dia = $data['fin_dia']; }
        if(empty($data['id_empleado'])){ $id_empleado = false; } else { $id_empleado = $data['id_empleado']; }
        if(empty($data['id_area'])){ $id_area = false; } else { $id_area = $data['id_area']; }
        $fin_dia = Carbon::parse($fin_dia)->addDay();


        if($usuario) {
            // Buscamos con admin o contralor
                $resultados = Install::with('user')
                    ->with('area')
                    ->with('division')
                    ->with('status')
                    ->with('responsable')
                    ->with('reporte')
                    ->with('cancelacion')
                    ->where('status_id', $c_status, $status)
                    ->where('user_id', '=', $id_empleado)
                    ->where('created_at', 'LIKE', '%'.$ini_dia.'%')
                    ->orderBy('area_id', 'ASC')->get();


        } else {
                $resultados = Install::with('user')
                    ->with('area')
                    ->with('division')
                    ->with('status')
                    ->with('responsable')
                    ->with('reporte')
                    ->with('cancelacion')
                    ->where('user_id', '=', Auth::user()->id)
                    ->where('status_id', '=', $status)
                    ->where('created_at', 'LIKE', '%'.$ini_dia.'%')
                    ->orderBy('area_id', 'ASC')->get();
            }


        $title 	= 'Eistel | Resultados de la búsqueda';
        $body 	= 'ospanel';
        return view('search.results', compact('title','body','resultados','tecnicos','area','status'));

    }



}
