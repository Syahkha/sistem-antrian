<?php

namespace App\Http\Controllers\display;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon; 
class display extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function display(){ 
        
        $data = DB::table('panggilan')
            ->join('departement', 'panggilan.id_departemen', '=', 'departement.id')
            ->join('counter', 'panggilan.id_counter', '=', 'counter.id')
            ->select('panggilan.*', 'departement.letter', 'counter.name')
            ->where('tgl_panggil', Carbon::now()->format('Y-m-d'))
            ->orderBy('id', 'desc')
            ->take(1)
            ->get();

        return view('admin.display',['data'=>$data]);

    }
    
}
