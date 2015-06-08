<?php namespace App;

use App\Cliente;
use Illuminate\Database\Eloquent\Model;

class Area extends Model {
	protected $table = 'areas';

    protected $fillable = ['name'];

}
