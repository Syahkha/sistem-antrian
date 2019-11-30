<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class akun extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    function akun(){
        $id=Auth::user()->id;        
        $data=DB::select('select * from users where id=?',[$id]);
        if($data){
            return view('admin.akun',['data'=>$data]);
        }
        
    }
    function upakun(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required',
          
        ]);
        $id=$request->id;
        $nam=$request->name;
        $email=$request->email;
       
        $pas=Hash::make($request->pass);
        if(empty($request->pass)){
            $data=DB::update('update users set name=?,email=? where id=?',[$nam,$email,$id]);
            if($data){
                return redirect()->action('admin\akun@akun')->with("msg","Berhasil Disimpan");
                }
            }else{
            $data=DB::update('update users set name=?,email=?,password=? where id=?',[$nam,$email,$pas,$id]);
            if($data){
                   return redirect()->action('admin\akun@akun')->with("msg","Berhasil Disimpan");
        
            }
        }
    }    
    function dataA(){
        $data=DB::table('users')
                ->leftjoin('roles','roles.id','=','users.roles_id')
                ->where('roles.role','!=','super admin')
                ->select(DB::raw('users.*,roles.*,users.id as ids,roles.id as idr'))
                ->paginate(10);
        $roles=DB::select("select * from roles where id !='1'");
        return view('admin.data_akun',['data'=>$data,'role'=>$roles]);        
    }
    function updateA(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'role'=>'required',            
        ]);
        $id=$request->id;
        $nam=$request->name;
        $email=$request->email;
        $pas=Hash::make($request->pass);
        $role=$request->role;
        if(empty($request->pass)){
            $data=DB::update('update users set name=?,email=?,roles_id=? where  id=?',[$nam,$email,$role,$id]);
            if($data){
                return redirect()->action('admin\akun@dataA')->with('msg',"Berhasil Disimpan");
            }
        }else{
            $data=DB::update('update users set name=?,email=?,password=?,roles_id=? where  id=?',[$nam,$email,$pas,$role,$id]);
            if($data){
                return redirect()->action('admin\akun@dataA')->with('msg',"Berhasil Disimpan");
            }
        }
        
    }
    function simpanA(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'pass'=>'required',
            'role'=>'required',            
        ]);
        $nam=$request->name;
        $email=$request->email;
        $pas=Hash::make($request->pass);
        $role=$request->role;

        $data=DB::insert('insert into users(roles_id,name,email,password) values(?,?,?,?)',[$role,$nam,$email,$pas]);
        if($data){
            return redirect()->action('admin\akun@dataA')->with('msg',"Berhasil Disimpan");
        }
    }
    function hapusA($ids){
        $data=DB::delete('delete from users where id=?',[$ids]);
        if($data){
            return redirect()->action('admin\akun@dataA')->with("msg",'Berhasil Dihapus');
        }else{
            return redirect()->action('admin\akun@dataA')->with("msg",'Gagal Dihapus');
        }
    }
}
