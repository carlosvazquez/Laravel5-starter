<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model {

	protected $table = 'pages';

	protected $fillable = [
		'title',
		'slug',
		'content',
		'meta-description',
		'meta-og',
		'meta-twitter',
		'published_at'
		];

}
