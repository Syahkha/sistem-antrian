<?php

namespace App\Http\Controllers\departement;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class departement extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    function showdepartement(){
        $data=DB::table('departement')->get();
        return view('admin.departement',['data'=>$data]);
    }

    function updepartement(Request $request){
        $request->validate([
            'id'=>'required',
            'nama'=>'required',
            'letter'=>'required'
        ]);
        $id=$request->id;
        $nama=$request->nama;
        $letter=$request->letter;

        $data=DB::update('update departement set nama=?,letter=? where id=?',[$nama,$letter,$id]);
        if($data){
            return redirect()->action('departement\departement@showdepartement')->with('msg','Berhasil Diupdate');
           }else{
            return redirect()->action('departement\departement@showdepartement')->with('psn','Gagal Diupdate');
           }
    }
    function tambahdepartement(Request $request){
        $request->validate([
            'nama'=>'required',
            'letter'=>'required'
        ]);
        $nama=$request->nama;
        $letter=$request->letter;

        $data=DB::insert('insert into departement(nama,letter) values(?,?)',[$nama,$letter]);
        if($data){
            return redirect()->action('departement\departement@showdepartement')->with('msg','Berhasil Disimpan');
           }else{
            return redirect()->action('departement\departement@showdepartement')->with('psn','Gagal Disimpan');
           }
    }
    function hapusdepartement($id){
        $data=DB::delete('delete from departement where id=?',[$id]);
        if($data){
            return redirect()->action('departement\departement@showdepartement')->with('msg','Berhasil Dihapus');
        }else{
            return redirect()->action('departement\departement@showdepartement')->with('psn','Gagal Dihapus');
        }
    }
}
