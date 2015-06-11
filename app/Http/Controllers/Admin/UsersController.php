<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\User;
use Bican\Roles\Models\Role;
use Illuminate\Support\Facades\Validator;
use Laracasts\Flash\Flash;
use Illuminate\Support\Facades\Request;

class UsersController extends Controller {


	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
    protected $role;

	public function index()
	{
        $users = User::paginate(15);

        return view('admin.users.index', compact('users'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        #$roles = Role::lists('name','id');

		return view('admin.users.create', compact('roles'));
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
        $user = User::findOrfail($id);
        return view('admin.users.edit', compact('user'));
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
        return redirect('admin/users');
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
