<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Install;
use App\Area;
use Jenssegers\Date\Date;
use App\User;
use Auth;
use DB;
use Excel;
use Laracasts\Flash\Flash;
use Illuminate\Support\Facades\Request;


class ExcelController extends Controller {

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
        //EXCEL REPORTES
        //POR AREA, EMPLEADO, ESTATUS Y RANGO DE DIAS Y POR EMPLEADO
        $resultados ='';
        $saludo = '';
        $tecnicos = User::where('type', '=', 'tecnico')->lists('username', 'id');
        $area = DB::table('areas')->lists('name', 'id');

        $data = Request::all();

        if($data) {
            $fecha = $data['fecha'];
            $saludo = Request::input('saludo').' mio champs';
            $saludo = $saludo * 32443245345324 * 345524323455432;
            $resultados = Install::where('os', 'LIKE', '%'.$fecha.'%')->get();
        }
        $title 	= 'Eistel | Listado de orden de Servicio';
        $body 	= 'ospanel';

        return view('excel.index', compact('title','body', 'data','saludo','tecnicos', 'area', 'resultados'));
    }



    public function generator()
    {

        $instalaciones = Install::all();

        $data = [];
        array_push($data, array('OS','Area','División','Nombre Cliente','Domicilio','Teléfono','Fecha Agendación', 'Fecha migración', 'Potencia','Velocidad download', 'Upload','Status OS', 'Dto.','Terminal óptica', 'Aerea o Sub', 'OK', 'Dom. Cerrado', 'Reag', 'Mal Dto.','Canc','Etapa no 75', 'No señal', 'Falta tiempo', 'Ya install.','25','50','75', '125', 'Modem ADSL', 'ONT nueva','No lo tiene', 'Se nego', 'Proveedor', 'Factura', 'Contratista', 'No. empleado', 'Versión de SW ONT', 'Velocidad Subida', 'Horario programado de cita', 'Horario de llegada al domicilio'));

        foreach($instalaciones as $key => $value)
        {
            array_push($data, array($value->user->username));
        }


        Excel::create('Reporte', function($excel) use($data) {
            // Set the title
            $excel->setTitle('Resporte Eistel');

            // Chain the setters
            $excel->setCreator('Eistel | Website')
                ->setCompany('Eistel');
            // Call them separately
            $excel->setDescription('Reporte pormenorizado de OS');


            $excel->sheet('Sheetname', function($sheet) use($data) {
                $sheet->setOrientation('landscape');
                $sheet->setPageMargin(0.12);

                $sheet->fromArray($data, null, 'A1', false, false);

            });

        })->download('xlsx');



    }
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */


}
