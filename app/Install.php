<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Install extends Model {
	protected $table = 'installs';

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
}
