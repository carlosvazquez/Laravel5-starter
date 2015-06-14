<?php namespace App\Http\Controllers\OsPanel;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Bican\Roles\Models\Role;
use App\User as User;
use Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Request;

class UsersController extends Controller {


	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
    protected $role;

    public function __construct()
    {
        $this->middleware('auth');
    }

	public function index()
	{
        if(Auth::user()->type == 'tecnico' or Auth::user()->type =="supervisor") {
            flash()->er('No tiene acceso a esta url.');
            return redirect('ospanel');
        }

        $users = User::paginate(15);

        $title 	= 'OsPanel | Ordenes de Servicio';
        $body 	= 'ospanel';

        return view('ospanel.users.index', compact('title','body','users'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{

        #$roles = Role::lists('name','id');
        $title 	= 'OsPanel | Alta de usuario';
        $body 	= 'ospanel';

		return view('ospanel.users.create', compact('title','body','roles'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{

        $data = Request::all();

        $role = $data['type'];

        if($role === "admin") {
            $role = 1;
        } elseif($role === "contralor") {
            $role = 2;
        }elseif($role === "supervisor") {
            $role = 3;
        } elseif($role === "tecnico") {
            $role = 4;
        }

        $rules = array(
            'username'      => 'required|alpha_num|min:4',
            'first_name'    => 'required|alpha|min:4',
            'last_name'     => 'required|alpha|min:4',
            'email'         => 'required|unique:users,email',
            'password'      => 'required|min:4',
            'actived'       => 'required|boolean'
        );

        $v = Validator::make($data, $rules);

        if ($v->fails()) {
            flash()->error('Hay errores en el formulario. No se guardó el registro.');
            return redirect()->back()
                ->withErrors($v->errors())
                ->withInputs(Request::except('password'));

        }

        $user = new User($data);
        $user->save();
        $role = Role::find($role);
        User::find($user->id)->attachRole($role);

        flash()->success('Técnico dado de alta con éxito.');

        return redirect()->back();

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{

	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{

        $user = User::findOrfail($id);

        return view('ospanel.users.edit', compact('user'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{

        $user = User::findOrfail($id);
        $user->fill(Request::all());
        $user->save();
        flash()->success('El usuario fue actualizado correctamente.');
        return redirect('ospanel/users');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{


	}

}
