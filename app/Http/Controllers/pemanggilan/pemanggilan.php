<?php

namespace App\Http\Controllers\pemanggilan;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\antrian;
use App\panggilan;


class pemanggilan extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    function pemanggilan(){
        $data = DB::table('antrian')
            ->leftJoin('departement', 'antrian.id_departement', '=', 'departement.id')
            ->get();
        $dataDep = DB::table('departement')->get();
        $dataLoket = DB::table('counter')->get();
       
        
        return view('admin.pemanggilan',['data'=>$data,'loket'=>$dataLoket,'dataDep'=>$dataDep]);
    }

    function panggil(Request $request){
        $request->validate([
            'id'=>'required',
            'idCounter'=>'required',
        ]);

        $id=$request->id;
        $idCounter=$request->idCounter;
       

        $antrian=antrian::where('id_departement',$id)
            ->where('status',0)
            ->where('created_at', '>',  Carbon::now()->format('Y-m-d 00:00:00'))
            ->first();
            

            if($antrian==null) {
            
                return redirect()->action('pemanggilan\pemanggilan@pemanggilan')->with('msg','Antrian Kosong');
            }else{
                $B=antrian::where('id_departement',$id)
                ->where('status',0)
                ->where('created_at', '>',  Carbon::now()->format('Y-m-d 00:00:00'))
                ->first()
                ->update(['status' => 1 ]);
                
                $A=panggilan::create([
                    'id_departemen' => $id,
                    'id_counter' => $idCounter,
                    'id_antrian' => $antrian->id,   
                    'nomer_antrian' => $antrian->nomer_antrian,
                    'tgl_panggil' => Carbon::now()->format('Y-m-d'),
                ]);
                $A->save();

                return redirect()->action('pemanggilan\pemanggilan@pemanggilan')->with('msg','Pemanggilan Berhasil');
            }
       
    }
}
