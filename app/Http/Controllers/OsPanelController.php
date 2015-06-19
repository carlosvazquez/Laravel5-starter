<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use App\Install;
use Carbon\Carbon;
use Illuminate\Http\Request;

class OsPanelController extends Controller {

    protected $mio;

    public function __construct()
    {
        $this->middleware('auth');
        $this->hoy = Carbon::today('America/Tijuana')->toDateTimeString();

    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */




    public function index()
    {
        $mio = Auth::user()->id;

        if(Auth::user()->type != 'tecnico') {

            $asignadas = Install::with('user')
                ->with('area')
                ->with('division')
                ->with('status')
                ->with('responsable')
                ->with('reporte')
                ->with('cancelacion')
                ->where('status_id', '=', '3' )
                #->where('created_at', '>=', $this->hoy )
                #->where('created_at', '>=', $this->hoy )
                ->orderBy('created_at', 'DESC')->get();

            $canceladas = Install::with('user')
                ->with('area')
                ->with('division')
                ->with('status')
                ->with('responsable')
                ->with('reporte')
                ->with('cancelacion')
                ->where('status_id', '=', '5' )
                #->where('created_at', '>=', $this->hoy )
                ->orderBy('created_at', 'DESC')->get();

            $completadas = Install::with('user')
                ->with('area')
                ->with('division')
                ->with('status')
                ->with('responsable')
                ->with('reporte')
                ->with('cancelacion')
                ->where('status_id', '=', '6' )
                #->where('created_at', '>=', $this->hoy )
                ->orderBy('created_at', 'DESC')->get();

            $procesos = Install::with('user')
                ->with('area')
                ->with('division')
                ->with('status')
                ->with('responsable')
                ->with('reporte')
                ->with('cancelacion')
                ->where('status_id', '=', '1' )
                #->where('created_at', '>=', $this->hoy )
                ->orderBy('created_at', 'DESC')->get();
            $reprogramadas = Install::with('user')
                ->with('area')
                ->with('division')
                ->with('status')
                ->with('responsable')
                ->with('reporte')
                ->with('cancelacion')
                ->where('status_id', '=', '4' )
                ->orderBy('created_at', 'DESC')->get();

            $confirmadas = Install::with('user')
                ->with('area')
                ->with('division')
                ->with('status')
                ->with('responsable')
                ->with('reporte')
                ->with('cancelacion')
                ->where('status_id', '=', '2' )
                #->where('created_at', '>=', $this->hoy )
                ->orderBy('created_at', 'DESC')->get();

            $title 	= 'OsPanel | Ordenes de Servicio';
            $body 	= 'ospanel';
            return view('indexadmin', compact('title','body', 'installs', 'canceladas', 'asignadas', 'completadas', 'procesos', 'reprogramadas', 'confirmadas'));
        } else {

            $installs = Install::with('user')
                ->with('area')
                ->with('division')
                ->with('status')
                ->with('responsable')
                ->with('reporte')
                ->with('cancelacion')
                ->where('user_id', $mio)
                ->where('status_id', '!=', '7')
                #->where('created_at', '>=', $this->hoy)
                ->orderBy('status_id', 'ASC')->get();


            $title 	= 'OsPanel | Ordenes de Servicio';
            $body 	= 'ospanel';
            return view('indexuser', compact('title','body', 'installs'));

        }



    }

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
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
