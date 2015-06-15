<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Install;
use App\User;
use App\Cancel;
use Auth;
use Jenssegers\Date\Date;
use App\Report;

use Illuminate\Support\Facades\Validator;
use Laracasts\Flash\Flash;
use Illuminate\Support\Facades\Request;


class InstallsController extends Controller {

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
        $installs = Install::paginate(15);

		$title 	= 'Eistel | Orden de Servicio';
		$body 	= 'ospanel';

		return view('installs.index', compact('installs','title','body'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        $user = Auth::user()->id;
        $fecha = Date::now();


        $title 	= 'Alta orden de servicio';
        $body 	= 'ospanel registro-instalacion';


        return view('installs.create', compact('title','body', 'user', 'fecha'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
    public function store()
    {
        $data = Request::all();


        $rules = array(
            'os'        => 'required|alpha_num',
            'name'      => 'required',
            'domicilio' => 'required|min:4',
            'telefono'  => 'required|min:4',
        );

        $v = Validator::make($data, $rules);

        if ($v->fails()) {
            flash()->error('Hay errores en el formulario. No se guardó el registro.');
            return redirect()->back()
                ->withErrors($v->errors())
                ->withInputs(Request::except('password'));

        }

        $user = new Install($data);
        $user->save();

        flash()->success('La orden de servicio fue dada de alta con éxito.');
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
        $install = Install::find($id);
        $cancel = Cancel::find($id);

        $title 	= 'OsPanel | Ordenes de Servicio';
        $body 	= 'ospanel';


        return view('installs.show', compact('title','body', 'install','cancel'));

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
        $dia  = Date::now()->format('Y-m-d');
        $hora = $data['hora'];
        $minuto = $data['minuto'];
        $data['programado'] = $dia.' '.$hora.':'.$minuto.':00:00';

        #$programahora = $data['hora'].':'.$data['minuto'].':00';
        #dd($data);
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
