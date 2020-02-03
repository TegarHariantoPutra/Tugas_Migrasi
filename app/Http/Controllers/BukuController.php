<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\Buku_model;
use Auth;
class BukuController extends Controller
{
    public function store(Request $req)
    {
        $validator=Validator::make($req->all(),
        [
            'judul'=>'required',
            'penerbit'=>'required',
            'pengarang'=>'required',
            'foto'=>'required'
           
        ]);
        if($validator->fails()){
            return Response()->json($validator->errors());
        }

        $simpan=Buku_model::create([
            'judul'=>$req->judul,
            'penerbit'=>$req->penerbit,
            'pengarang'=>$req->pengarang,
            'foto'=>$req->foto
        ]);
        if($simpan){
            return Response()->json(['status'=>1]);
        }else{
            return Response()->json(['status'=>0]);
        }
    }
    public function update($id_buku,Request $req)
    {
        $validator=Validator::make($req->all(),
        [
            'judul'=>'required',
            'penerbit'=>'required',
            'pengarang'=>'required',
            'foto'=>'required'
        ]);

        if($validator->fails()){
            return Response()->json($validator->errors());
        }
        $ubah=Buku_model::where('id', $id_buku)->update([
            'judul'=>$req->judul,
            'penerbit'=>$req->penerbit,
            'pengarang'=>$req->pengarang,
            'foto'=>$req->foto
        ]);
        if($ubah){
            return Response()->json(['status'=>1]);
        }else{
            return Response()->json(['status'=>0]);
        }
    }
    
    public function hapus($id_buku)
    {
        $hapus=Buku_model::where('id',$id_buku)->delete();
        if($hapus){
            return Response()->json(['status'=>1]);
        }else{
            return Response()->json(['status'=>0]);
        }
    }

    public function tampil_buku(){
        if(Auth::User()->level=="admin"){
            $dt_buku=Buku_model::get();
            return response()->json($dt_buku);
        }else{
            return response()->json(['status'=>'anda bukan admin']);
        }
    }
}
