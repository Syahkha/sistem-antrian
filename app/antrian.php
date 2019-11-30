<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class antrian extends Model
{
    protected $table = "antrian";
    protected $fillable = ['id_departement', 'status'];
}
