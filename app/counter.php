<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class counter extends Model
{    
    protected $table = "counter";

    public function panggilan()
	{
		return $this->belongsTo('App\panggilan','id');
	}
}
