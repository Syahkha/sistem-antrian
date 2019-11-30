<?php

namespace App\Http\Controllers\setting;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class setting extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    function GetSetting(Request $request){       
        $data=DB::select('select * from setting');      
        
        return view('admin.setting',['data'=>$data]);
    }

    function UpSetting(Request $request){
        $request->validate([
            'nama'=>'required',
            'alamat'=>'required',
            'email'=>'required',
            'kontak'=>'required',
            'id'=>'required',
        ]);
        $id=$request->id;
        $nama=$request->nama;
        $email=$request->email;
        $alamat=$request->alamat;
        $kontak=$request->kontak;
        $data=DB::update('update setting set nama=?,alamat=?,email=?,kontak=? where id=?',[$nama,$alamat,$email,$kontak,$id]);
        if($data){
            return redirect()->action('setting\setting@GetSetting')->with("msg","Berhasil Diupdate");      
        }else{
            return redirect()->action('setting\setting@GetSetting')->with("msg","Gagal Diupdate");
        }
    }

}
