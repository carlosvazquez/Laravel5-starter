<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Bican\Roles\Models\Role;
use App\User as User;
use App\Install;
use App\Report;
use Auth;
use HttpRequestDataShare;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Request;


class ReportsController extends Controller {


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
        #$reporte = new Report;
        #$reporte->potencia = '619';
        #$reporte->download = '322';
        #$reporte->upload = '431';

        #$instalacion = Install::find(2);
        #$instalacion->reporte()->save($reporte);
        #dd($instalacion);
        flash()->error('No tiene acceso a la url.');
        return redirect('/');


    }


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{

        $id = Request::all();
        $id = implode(",", $id);
        $instalacion_id = Install::find($id);
        $osinstalacion = $instalacion_id->os;
        $currentuser = Auth::user()->id;
        $username = Auth::user()->username;
        // Verificamos que exista una instalación propietaria del reporte
        if ($instalacion_id == NULL) {
            flash()->error('No existe la instalación.');
            return redirect('/');
        }
        // Verificamos que el tecnico sea el mismo quien crea el reporte de la instalacion
        if ($instalacion_id->user_id != $currentuser) {
            flash()->error('No eres el técnico responsable.');
            return redirect('/');
        }

        // Verificamos que no exista ya un reporte de dicha instalacion
        if(Report::find($id) != NULL) {
            flash()->error('El reporte ya existe.');
            return redirect('/');
        }


        $title 	= 'OsPanel | Creación de reporte de servicio';
        $body 	= 'ospanel reporte-instalacion';

        #flash()->success('El reporte fue creado con éxito.');
        return view('reports.create', compact('title','body', 'id', 'osinstalacion', 'username'));

	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
        $data = Request::all();

        $id = $data['id'];
        $reportstatus = $data['reportstatus'];

        $rules = array(

        );

        $v = Validator::make($data, $rules);

        if ($v->fails()) {
            flash()->error('Hay errores en el formulario. No se guardó el registro.');
            return redirect()->back()
                ->withErrors($v->errors())
                ->withInputs(Request::except('password'));

        }
        $reporte = new Report($data);

        $install = Install::find($id);
        $install->reporte()->save($reporte);
        if($reportstatus == 1) {
            $actualizacion = Install::find($id);

            $cambios = array(
                'status_id' => '1'
            );
            $actualizacion->fill($cambios);
            $actualizacion->save();
            flash()->success('El reporte fue cerrado con éxito.');
            return redirect('/');
        }

        flash()->success('El reporte de la OS fue dada de alta con éxito.');
        #return Redirect::clientes();
        #$input = Input::all();
        #User::create( $input );
        return redirect('/');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */

        public function show($id)
	{
        $data = Report::find($id);
        if($data == NULL) {
            flash()->error('El reporte que busca no existe.');
            return redirect('/');
        }


        $title 	= 'OsPanel | Creación de reporte de servicio';
        $body 	= 'ospanel reporte-instalacion';
        return view('reports.show', compact('title', 'body', 'data'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        $reporte = Report::findOrfail($id);
        $username = Auth::user()->username;

        if($reporte->reportstatus == 1) {
            flash()->error('La instalación ya está cerrada.');
            return redirect('/');
        }

        $title 	= 'OsPanel | Editar de reporte de servicio';
        $body 	= 'ospanel reporte-instalacion';

        return view('reports.edit', compact('title','body','reporte', 'username'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
        $data = Report::findOrfail($id);

        $data->fill(Request::all());
        $data->save();

        $reportstatus = $data['reportstatus'];

        if($reportstatus == 1 ){

            $actualizacion = Install::find($reportstatus);

            $cambios = array(
                'status_id' => '6'
            );
            $actualizacion->fill($cambios);
            $actualizacion->save();
            flash()->success('La instalación fue cerrada con éxito.');
            return redirect('/');
        }

        flash()->success('El reporte fue actualizado correctamente.');
        return redirect('/');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
