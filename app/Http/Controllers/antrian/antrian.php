<?php

namespace App\Http\Controllers\antrian;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class antrian extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    function antrian(Request $request){       
        $data=DB::select('select * from departement');      
        
        return view('admin.antrian',['data'=>$data]);
    }
    function upantrian(Request $request){
        $request->validate([
            'mulai'=>'required',
            'akhir'=>'required',
        ]);
        $id=$request->id;
        $mulai=$request->mulai;
        $akhir=$request->akhir;
        $data=DB::update("update tb_loket set mulai=?,akhir=?,sekarang=? where id_loket=?",[$mulai,$akhir,$mulai,$id]);
        if($data){            
            return redirect()->action('antrian\antrian@antrian')->with("msg","Antrian Berhasil Diupdate");           
        }else{
            return redirect()->action('antrian\antrian@antrian')->with("psn","Antrian Gagal Diupdate");
        }
    }
    function buat(Request $request){
        $id=$request->id;
        $value=DB::select("select * from departement where id=?",[$id]);  
        foreach($value as $data);
        

        $lastToken=DB::table('antrian')
        ->leftJoin('departement','departement.id','=','antrian.id_departement')
        ->where('id_departement',$id)
        ->first();
        
        if($lastToken){
            DB::table('antrian')
            ->where('id_departement',$id)
            ->insert([
                'nomer_antrian' => ((int)$lastToken->nomer)+1,
                'id_departement' => $id,
                'status' => 0,
            ]);
        }else{
            DB::table('antrian')
            ->where('id_departement',$id)
            ->insert([
                'nomer_antrian' => $data->mulai,
                'id_departement' => $id,
                'status' => 0,
            ]);
        }
        
        $data=DB::update('update departement set nomer=nomer+1 where id=?',[$id]);

        $value=DB::select("select * from departement where id=?",[$id]);  
        foreach($value as $data);
        $request->session()->flash( 'namadepartemen' , $data->nama);
        $request->session()->flash( 'kode' , $data->letter  );
        $request->session()->flash( 'no' , $data->nomer  );
            return redirect()->action('antrian\antrian@antrian');
        
    }
   function restart(){
       DB::table('antrian')->delete();
       DB::update('update departement set nomer=0');
       return redirect()->action('pemanggilan\pemanggilan@pemanggilan');
   }
}

