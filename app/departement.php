<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class departement extends Model
{
	protected $table = "departement";
	
	protected $fillable = ['letter'];

    public function panggilan()
	{
		return $this->belongsTo('App\panggilan','id');
	}
}
