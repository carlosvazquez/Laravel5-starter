<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model {
    protected $table = 'reports';
    protected $primaryKey = 'install_id';

    protected $fillable = [
        'install_id',
        'potencia',
        'download',
        'upload',
        'dto',
        'terminal',
        'ont',
        'opcion',
        'dist25',
        'dist50',
        'dist75',
        'dist125',
        'modemadsl',
        'ont_nueva',
        'no_tiene',
        'se_nego',
        'proveedor',
        'factura',
        'contratista',
        'noempleado',
        'vsw_ont',
        'velupload'
    ];
    public function install()
    {
        return $this->belongsTo('App\Install');

    }
}