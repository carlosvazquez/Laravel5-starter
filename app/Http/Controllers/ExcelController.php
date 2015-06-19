<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use App\Install;
use App\User;
use App\Report;
use App\Cancel;
use Carbon\Carbon;
use Excel;
use Jenssegers\Date\Date;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\DB;


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
        //POR AREA, ESTATUS Y RANGO DE DIAS Y POR EMPLEADO
        $resultados ='';
        $saludo = '';
        $tecnicos = User::where('type', '=', 'tecnico')->lists('username', 'id');
        $area = DB::table('areas')->lists('name', 'id');
        $status = DB::table('statuses')->lists('slug', 'id');





        $data = Request::all();

        if($data) {
            $fecha = $data['fecha'];
            $saludo = Request::input('saludo').' mio champs';
            $saludo = $saludo * 32443245345324 * 345524323455432;
            $resultados = Install::where('os', 'LIKE', '%'.$fecha.'%')->get();
        }
        $title 	= 'Eistel | Listado de orden de Servicio';
        $body 	= 'ospanel';

        return view('excel.index', compact('title','body', 'data','saludo','tecnicos', 'area', 'resultados', 'status'));
    }

    private function random_string($length) {
        $key = '';
        $keys = array_merge(range(0, 9), range('a', 'z'));

        for ($i = 0; $i < $length; $i++) {
            $key .= $keys[array_rand($keys)];
        }
        return $key;
    }




    public function generator()
    {
        $data = Request::all();

        $empleado = $data['empleado'];
        $c_empleado = '!=';

        $status = $data['status'];
        $c_status = '!=';

        $id_empleado = $data['id_empleado'];
        $id_status = $data['id_status'];

        $area = $data['area'];
        $id_area = $data['id_area'];
        $c_area = '!=';

        $ini_dia = $data['ini_dia'];
        $fin_dia = $data['fin_dia'];

        $fin_dia = Carbon::parse($fin_dia)->addDay();


        if($empleado != 0 ) {

            $empleado = $id_empleado;
            $c_empleado = '=';
        }

        // Si el estatus es diferente de 0, se queda

        if($status != 0 ) {

            $status = $id_status;
            $c_status = '=';
        }

        if($area != 0 ) {

            $area = $id_area;
            $c_area = '=';
        }

        if($area != 0 ) {

            $area = $id_area;
            $c_area = '=';
        }

        if($ini_dia === $fin_dia) {

            $instalaciones = Install::with('user')
                ->with('area')
                ->with('division')
                ->with('status')
                ->with('responsable')
                ->with('reporte')
                ->with('cancelacion')
                ->where('user_id', $c_empleado, $empleado)
                ->where('status_id', $c_status, $status)
                ->where('area_id', $c_area, $area)
                ->where('created_at', 'LIKE', '%'.$ini_dia.'%')
                ->orderBy('area_id', 'ASC')->get();
        } else {

            $instalaciones = Install::with('user')
                ->with('area')
                ->with('division')
                ->with('status')
                ->with('responsable')
                ->with('reporte')
                ->with('cancelacion')
                ->where('user_id', $c_empleado, $empleado)
                ->where('status_id', $c_status, $status)
                ->where('area_id', $c_area, $area)
                ->where('created_at', '>', $ini_dia)
                ->where('created_at', '<', $fin_dia)
                ->orderBy('area_id', 'ASC')->get();

        }


        $reportname = 'Reporte';

        $data = [];

        array_push($data, array(
            'OS',
            'Area',
            'División',
            'Nombre Cliente',
            'Domicilio',
            'Teléfono',
            'Fecha Agendación',
            'Fecha migración',
            'Potencia',
            'Velocidad download',
            'Upload',
            'Status OS',
            'Dto.',
            'Terminal óptica',
            'Aerea o Sub',
            'OK',
            'Dom. Cerrado',
            'Reag',
            'Mal Dto.',
            'Canc',
            'Etapa no 75',
            'No señal',
            'Falta tiempo',
            'Ya install.',
            'Falla ONT',
            '25','50','75','125',
            'Modem ADSL',
            'ONT nueva',
            'No lo tiene',
            'Se nego',
            'Proveedor',
            'Factura',
            'Contratista',
            'No. empleado',
            'Versión de SW ONT',
            'Velocidad Subida',
            'Horario programado de cita',
            'Horario de llegada al domicilio'
        ));

        foreach($instalaciones as $key => $value)
        {

            array_push($data, array(
                $value->os,
                $value->area['name'],
                $value->division['name'],
                $value->name,
                $value->domicilio,
                $value->telefono,
                $value->created_at,
                $value->updated_at,
                $value->reporte['potencia'],
                $value->reporte['download'],
                $value->reporte['upload'],
                $value->status['slug'],
                $value->reporte['dto'],
                $value->reporte['terminal'],
                $value->reporte['opcion'],
                $value->status['slug'],
                $value->cancelacion['cerrado'],
                $value->cancelacion['reag'],
                $value->cancelacion['mal_dto'],
                $value->cancelacion['cancelado'],
                $value->cancelacion['etpno75'],
                $value->cancelacion['sin_senal'],
                $value->cancelacion['ftiempo'],
                $value->cancelacion['yainstalada'],
                $value->cancelacion['falla_ont'],
                $value->reporte['dist25'],
                $value->reporte['dist50'],
                $value->reporte['dist75'],
                $value->reporte['dist125'],
                $value->reporte['modemadsl'],
                $value->reporte['ont_nueva'],
                $value->reporte['no_tiene'],
                $value->reporte['se_nego'],
                $value->reporte['proveedor'],
                $value->reporte['factura'],
                $value->reporte['contratista'],
                $value->user['username'],
                $value->user['vsw_ont'],
                $value->user['velupload'],
                $value->reporte['created_at'],
                $value->reporte['updated_at']
                ));
        }


        Excel::create($reportname, function($excel) use($data) {
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
