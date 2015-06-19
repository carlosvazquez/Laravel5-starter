<?php namespace App\Helpers;

use App\Install;
use Auth;
use Illuminate\Support\Facades\DB;

class Owner {


    public static function firewall($id)
    {
        $search = Install::find($id);
        $usuario = Auth::user();

        $existe = false;
        if(isset($search->reporte->install_id))
        {
            $existe = true;
        }

        // si es true se ejecuta
        if ($search && $existe != true) {
            $status = $search->status_id;

            if ($usuario->type == 'admin' || $usuario->type == 'contralor' || $usuario->type == 'contralor') {

                //Existe el post y soy admin o contralor devuelve true
                return true;
                exit();
            }

            if ($usuario->id == $search->user_id) {

                if (in_array($status, array(1,2,3,4,5,6,7))) {

                    //si existe y se puede editar
                    return true;

                }
                //Si existe y tú eres el tecnico y pero no puedes editarla
                return false;
                exit();

            }
            //Existe pero no se puede editar
            return false;
        }
        // No existe
        return false;

    }


    public static function cancelacion($id)
    {
        $search = Install::find($id);
        $usuario = Auth::user();

        $existe = false;
        if(isset($search->cancelacion->install_id))
        {
            $existe = true;
        }

        // si es true se ejecuta
        if ($search && $existe != true) {
            $status = $search->status_id;

            if ($usuario->type == 'admin' || $usuario->type == 'contralor' || $usuario->type == 'tecnico') {

                //Existe el post y soy admin o contralor devuelve true
                return true;
                exit();
            }

            if ($usuario->id == $search->user_id) {

                if (in_array($status, array(1,2,3,4,5,6,7))) {

                    //si existe y se puede editar
                    return true;

                }
                //Si existe y tú eres el tecnico y pero no puedes editarla
                return false;
                exit();

            }
            //Existe pero no se puede editar
            return false;
        }
        // No existe
        return false;

    }


    public static function instalacion_id($id)
    {
        $instalacion_id = DB::table('installs')->where('id', '=', $id)->pluck('id');

        return $instalacion_id;
    }


}