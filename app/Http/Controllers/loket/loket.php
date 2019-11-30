<?php

namespace App\Http\Controllers\loket;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class loket extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    function getLoket(){
        $data=DB::table('counter')->get();
     
       return view('admin.loket',['data'=>$data]);  
    }
    function tambahLoket(Request $request){
        $request->validate([
                'nama_loket'=>'required'
        ]);
        $nama=$request->nama_loket;

        $data=DB::insert('insert into counter(name) values(?)',[$nama]);
        if($data){
            return redirect()->action('loket\loket@getLoket')->with('msg','Berhasil disimpan');
           }else{
            return redirect()->action('loket\loket@getLoket')->with('msg','Gagal disimpan');
           }
    }
    function upLoket(Request $request){
        $request->validate([
            'id'=>'required',
            'nama_loket'=>'required'
            
        ]);
        $idl=$request->id;
        $namal=$request->nama_loket;

        $data=DB::update('update counter set name=? where id=?',[$namal,$idl]);
        if($data){
            return redirect()->action('loket\loket@getLoket')->with('msg','Berhasil Diupdate');
           }else{
            return redirect()->action('loket\loket@getLoket')->with('msg','Gagal Diupdate');
           }
    }
    function hapusLoket($id){
        $data=DB::delete('delete from counter where id=?',[$id]);
        if($data){
            return redirect()->action('loket\loket@getLoket')->with('msg','Berhasil Dihapus');
        }else{
            return redirect()->action('loket\loket@getLoket')->with('msg','Gagal Dihapus');
        }
    }
    function edit(Request $request){
        $request->validate([
            'id'=>'required',
            'id_loket'=>'required'
            
        ]);
        $id=$request->id;
        $idl=$request->id_loket;

        $data=DB::update('update users set id_loket=? where id=?',[$idl,$id]);
        if($data){
            return redirect()->action('loket\loket@getLoket')->with('msg','Berhasil Diupdate');
           }else{
            return redirect()->action('loket\loket@getLoket')->with('msg','Gagal Diupdate');
           }
    }
}
