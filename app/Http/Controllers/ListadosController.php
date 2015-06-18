<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Install;
use App\Cancel;
use Auth;
use Jenssegers\Date\Date;
use App\Report;
use App\User;
use Excel;
use Illuminate\Support\Facades\Validator;
use Laracasts\Flash\Flash;
use Illuminate\Support\Facades\Request;


class ListadosController extends Controller {

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

        $installs = Install::with('user')
            ->with('area')
            ->with('division')
            ->with('status')
            ->with('responsable')
            ->with('reporte')
            ->with('cancelacion')
            ->orderBy('id', 'DESC')
            ->paginate(15);

        $title 	= 'Eistel | Listado de orden de Servicio';
        $body 	= 'ospanel';

        return view('listados.index', compact('installs','title','body'));
    }


    public function excel()
    {
        //EXCEL REPORTES POR AREA, EMPLEADO, ESTATUS Y RANGO DE DIAS Y POR EMPLEADO
        $resultados ='';
        $saludo = '';
        $tecnicos = User::where('type', '=', 'tecnico')->lists('username', 'id');

        $data = Request::all();

        if($data) {
            $fecha = $data['fecha'];
            $saludo = Request::input('saludo').' mio champs';
            $resultados = Install::where('os', 'LIKE', '%'.$fecha.'%')->get();
        }
        $title 	= 'Eistel | Listado de orden de Servicio';
        $body 	= 'ospanel';

        return view('listados.excel', compact('title','body', 'data','saludo','tecnicos', 'resultados'));
    }


    public function generar() {
        return 'hello planet';
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */


}
