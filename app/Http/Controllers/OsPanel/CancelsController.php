<?php namespace App\Http\Controllers\OsPanel;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Bican\Roles\Models\Role;
use App\User as User;
use App\Install;
use App\Report;
use App\Cancel;
use Auth;
use Jenssegers\Date\Date as Date;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Request;

class CancelsController extends Controller {


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
		//
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

        if ($instalacion_id == NULL) {
            flash()->error('No existe la instalación.');
            return redirect('ospanel');
        }
        // Retornamos el numero de OS
        $osinstalacion = $instalacion_id->os;

        $currentuser = Auth::user()->id;
        // Verificamos que exista una instalación propietaria de la cancelacion
        if ($instalacion_id == NULL) {
            flash()->error('No existe la instalación.');
            return redirect('ospanel');
        }
        // Verificamos que el tecnico sea el mismo quien crea el reporte de la instalacion
        if ($instalacion_id->user_id != $currentuser) {
            flash()->error('No eres el técnico responsable.');
            return redirect('ospanel');
        }

        // Verificamos que no exista ya un reporte de dicha instalacion
        if(Cancel::find($id) != NULL) {
            flash()->error('La cancelación ya existe.');
            return redirect('ospanel');
        }

        $title 	= 'OsPanel | Creación de reporte de servicio';
        $body 	= 'ospanel cancelacion-instalacion';

        #flash()->success('El reporte fue creado con éxito.');
        return view('ospanel.cancels.create', compact('title','body', 'id','osinstalacion'));


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

        $rules = array(

        );


        $cancelacion = new Cancel($data);

        $install = Install::find($id);
        $install->cancelacion()->save($cancelacion);


        $actualizacion = Install::find($id);

        $diahoy = Date::now('America/Tijuana');
        $cambios = array(
            'status_id' => '5',
            'updated_at' => $diahoy
        );
        $actualizacion->fill($cambios);
        $actualizacion->save();





        flash()->success('La cancelación fue generada con éxito.');
        #return Redirect::clientes();
        #$input = Input::all();
        #User::create( $input );
        return redirect('ospanel');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        $data = Cancel::find($id);
        if($data == NULL) {
            flash()->error('La cancelación que busca no existe.');
            return redirect('ospanel');
        }

        $title 	= 'OsPanel | Ver cancelación de OS';
        $body 	= 'ospanel cancelacion-instalacion';
        return view('ospanel.cancels.show', compact('title', 'body', 'data'));

	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
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
