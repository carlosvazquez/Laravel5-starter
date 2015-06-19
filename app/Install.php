<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Install extends Model {
	protected $table = 'installs';

    protected $fillable = [
        'os',
        'user_id',
        'area_id',
        'division_id',
        'name',
        'telefono',
        'domicilio',
        'status_id',
        'programado',
        'reprogramado',
        'userupdate',
        'actived',
        'updated_at'
    ];


    public function user() {
        return $this->belongsTo('App\User');
    }
    public function area() {
        return $this->belongsTo('App\Area');
    }
    public function division() {
        return $this->belongsTo('App\Division');
    }
    public function status() {
        return $this->belongsTo('App\Status');
    }
    public function responsable() {
        return $this->belongsTo('App\User', 'userupdate', 'id');
    }
    public function reporte() {
        return $this->hasOne('App\Report');
    }
    public function cancelacion() {
        return $this->hasOne('App\Cancel');
    }
}
