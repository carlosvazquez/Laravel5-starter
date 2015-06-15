<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Cancel extends Model {
    protected $table = 'cancels';
    protected $primaryKey = 'install_id';

    protected $fillable = [
        'cerrado',
        'reag',
        'mal_dto',
        'subt',
        'ducto_in',
        'cancelado',
        'etpno75',
        'sin_senal',
        'ftiempo',
        'yainstalada',
        'falla_ont',
        'comentarios'
    ];
    public function install()
    {
        return $this->belongsTo('App\Install');

    }
}