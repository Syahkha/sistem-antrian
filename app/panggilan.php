<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class panggilan extends Model
{
    protected $table = "panggilan";

    protected $fillable = ['id_antrian', 'id_departemen', 'id_counter','user_id','nomer_antrian','tgl_panggil'];   
    

    public function departement()
	{
		return $this->hasMany('App\departement','id','id_departemen');
    }
    
    public function counter()
	{
		return $this->hasMany('App\counter','id','id_counter');
	}

}
